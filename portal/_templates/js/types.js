(function() {
	SIKBase.types = function() {
		var categoryTemplate = [
			'<div class="typeItem">',
				'<div class="typeHandle"></div>',
				'<div class="typeWrapper">',
					'<a href="#" title="Delete job type" class="deleteType"><img src="',
					'',
					'_templates/img/bin.png" alt="Delete" /></a>',
					'<label><span>Name:</span><input type="text" size="50" name="name[]" value="For example: Irregular" /><img class="help" src="../_templates/img/information-balloon.png" title="The name that will be used in the template" /></label>',
					'<a href="#" title="Save changes" class="saveType"><img src="',
					'',
					'_templates/img/disk.png" alt="Save changes" /></a>',
					'<label><span>Var name:</span><input type="text" id="nr" size="50" name="var_name[]" value="For example: irregular" /><img class="help" src="../_templates/img/information-balloon.png" title="Var name must not contain spaces or other special chars" /></label>',
				'</div>',
			'</div>'
		];
		
		var pointerPosition;
		var prevPointer;
		var minTop;
		var maxTop
		var currentEl;
		var elOrigPrev;
		var elOrigNext;
		var fieldOrigValue;
		var items;
		var saving = false;
		var mouseDown = function(e) {
			if ($(e.target).is('div.typeHandle') && saving == false) {
				currentEl = $(e.target.parentNode)
								.fadeTo(500, 0.4)
								.addClass('draggingItem')
								.get(0);
				elOrigPrev = currentEl.previousSibling;
				elOrigNext = currentEl.nextSibling;
				pointerPosition = e.pageY;
				minTop = -currentEl.offsetTop;
				maxTop = document.getElementById('typeContainer').offsetHeight - currentEl.offsetHeight + minTop;
				items = $('#typesContainer div.typeItem');
				$(document)
					.bind('mousemove', mouseMove)
					.bind('mouseup', mouseUp);
				return false;
			}
		};
		
		var mouseMove = function(e) {
			var newTop = Math.max(minTop,Math.min(maxTop, e.pageY - pointerPosition));
			var absTop = e.pageY - pointerPosition - minTop;
			currentEl.style.top = newTop + 'px';
			items.each(function(nr){
				if (this != currentEl) {
					var overlap = (absTop - this.offsetTop)/this.offsetHeight;
					if (overlap > 0 && overlap < 1) {
						var oldTop = minTop;
						minTop = -this.offsetTop;
						maxTop = document.getElementById('typesContainer').offsetHeight - currentEl.offsetHeight + minTop;
						if (e.pageY > prevPointer) {
							$(this).after(currentEl);
						} else {
							$(this).before(currentEl);
						}
						pointerPosition = pointerPosition  + oldTop - minTop;
						return false;
					}
				}
			});
			prevPointer = e.pageY;
			return false;
		};
		
		var updateCategoriesList = function() {
			$.ajax({
				type: 'post',
				url: SIK.SIK_admin_url + 'types/',
				data: {
					action: 'getTypesList'
				},
				success: function(responseText){
					$('#categs-nav ul').html(responseText);
				},
				complete: function(){
					SIKBase.overlay.hide();
				}
			})
			SIKBase.overlay.show(document.getElementById('categs-nav'));
		};
		
		var mouseUp = function(e) {
			$(document)
				.unbind('mousemove', mouseMove)
				.unbind('mouseup', mouseUp);
			$(currentEl)
				.fadeTo(500,1)
				.css('top', '0')
				.removeClass('draggingItem');
			if (currentEl.nextSibling != elOrigNext ||  currentEl.previousSibling != elOrigPrev) {
				SIKBase.messages.add('Categories order changed. Saving ...');
				saving = true;
				SIKBase.overlay.show(document.getElementById('categoriesContainer'));
				var order = [];
				$('#categoriesContainer div.categoryItem')
					.each(function(nr){
						order.push($(this).attr('rel'));
					});
				$.ajax({
					type: 'post',
					url: SIK.SIK_admin_url + 'categories/',
					data: {
						action: 'saveOrder',
						order: order.join(',')
					},
					success: function() {
						//updateCategoriesList();
					},
					complete: function(){
						SIKBase.overlay.hide();
						saving = false;
					}
				});
			}
			currentEl = elOrigPrev = elOrigNext = null;
			return false;
		};
		
		var mouseClick = function(e) {
			var el = $(e.target).is('img')? e.target.parentNode : e.target;
			if ($(el).is('a.deleteType')) {
				if (confirm('Are you sure you want to delete this job type?')) {
					SIKBase.overlay.show(el.parentNode.parentNode);
					saving = true;
					$.ajax({
						type: 'post',
						dataType: 'text',
						url: SIK.SIK_admin_url + 'types/',
						data: {
							action: 'deleteType',
							id: $(el).parent().parent().attr('rel')
						},
						success: function(responseText) {
							if(responseText == '0')
							{
								alert('You can\'t delete this job type because there are jobs with this type!');
								return;
							}
							 else {
								$(el)
									.parent()
									.parent()
									.fadeOut(
										500, 
										function(){
											$(this).remove()
										}
									);
								SIKBase.messages.add('The job type has been deleted');
								//updateCategoriesList();
							}
						},
						complete: function(){
							SIKBase.overlay.hide();
							saving = false;
						}
					});
					this.blur();
					return false;
				}
			} else if ($(el).is('a.saveType')) {
				SIKBase.overlay.show(el.parentNode.parentNode);
				saving = true;
				$.ajax({
					type: 'post',
					dataType: 'text',
					url: SIK.SIK_admin_url + 'types/',
					data: {
						action: 'saveType',
						id: $(el).parent().parent().attr('rel'),
						name: $(el).parent().find('input:first').val(),
						var_name: $(el).parent().find('input:last').val()
					},
					success: function() {
						SIKBase.messages.add('The job type has been saved');
						$(el).hide();
						//updateCategoriesList();
					},
					complete: function(){
						SIKBase.overlay.hide();
						saving = false;
					}
				});
				this.blur();
				return false;
			}
		};
		
		var inputFocus = function(e) {
			fieldOrigValue = this.value;
		};
		
		var inputBlur = function(e) {
			if (this.value != fieldOrigValue) {
				$(this)
					.parent()
					.parent()
					.find('a:last')
						.fadeIn(500);
						
				SIKBase.messages.add('Value changed. You must save the change!');
			}
		};
		
		var add = function(e) {
			this.blur();
			if (saving === true) {
				return false;
			}
			categoryTemplate[4] = SIK.SIK_admin_url;
			categoryTemplate[8] = SIK.SIK_admin_url;
			var el = $('#typesContainer')
					.append(categoryTemplate.join(''))
					.find('div.typeItem:last')
						.find('input')
							.bind('focus', inputFocus)
							.bind('blur', inputBlur)
							.end()
						.hide()
						.fadeIn(500)
						.get(0);
			SIKBase.overlay.show(el);
			
			$.ajax({
				type: 'post',
				dataType: 'text',
				url: SIK.SIK_admin_url + 'types/',
				data: {
					action: 'newType'
				},
				success: function(id) {
					$(el)
						.attr('rel', id)
						.find('input:first')
							.attr('name', 'name[' + id + ']')
							.end()
						.find('input:last')
							.attr('name', 'var_name[' + id + ']')
							.end();
						
					//updateCategoriesList();
				},
				complete: function(){
					SIKBase.overlay.hide();
					saving = false;
				}
			});
			return false;
		};
		return {
			init: function(){
				if (document.getElementById('typesContainer')) {
					$('#typesContainer')
						
						.bind('click', mouseClick)
						.find('input')
							.bind('focus', inputFocus)
							.bind('blur', inputBlur)
							.end()
						.next()
						.next()
						.find('a:first')
							.bind('click', add);
				}
			}
		};
	}();
	SIKBase.register(SIKBase.types.init, 'init');
})();