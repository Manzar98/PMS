{include file="header.tpl"}

<div id="content">
	<h2 id="pages">Pages - <em>{if isset($current_page)}&quot;{$current_page.title}&quot;{else}New page{/if}</em></h2>
	
	{if isset($errors)}
	<div class="fail">
		Please check for errors
	</div>
	{/if}
	
	<form id="publish_form" class="add_page" action="{$smarty.server.REQUEST_URI}" method="post">
		<div class="left span2 block">
			<h3>Page content</h3>
			<div class="block_inner">
				<div class="group{if isset($errors.page_title)} error{/if}">
					<label for="page_title">Page Heading</label>
					<input type="text" name="page_title" id="page_title" class="text_field" size="35" value="{if isset($defaults.page_title)}{$defaults.page_title}{/if}" />
					{if isset($errors.page_title)}<span class="suggestion">{$errors.page_title}</span>{/if}
				</div>
				<div class="group">
					<label for="page_content">Content</label>
					<textarea id="page_content" name="page_content" class="textarea_field mceEditor" cols="85" rows="25">{if isset($defaults.page_content)}{$defaults.page_content}{/if}</textarea>
				</div>
				<div class="group">
					<label><input type="checkbox" id="page_has_form" name="page_has_form" value="1"{if isset($defaults.page_has_form) == '1'} checked="checked"{/if} /> Add a contact form?</label>
					{if isset($defaults.page_has_form) != '1'}<div class="suggestion">You can change the feedback message after you save the page</div>{/if}
					<div {if isset($defaults.page_has_form) != '1'} class="hidden"{/if}>
						<label for="page_form_message">Form message</label></div>
					<div {if isset($defaults.page_has_form) != '1'} class="hidden"{/if}>
						<textarea id="page_form_message" name="page_form_message" class="textarea_field mceEditor" cols="85" rows="10">{if isset($defaults.page_form_message)}{$defaults.page_form_message}{/if}</textarea>
					</div>
				</div>
				<div class="group_submit">
					<button type="submit"><span>{if isset($current_page)}Save changes{else}Save page{/if}</span></button>
				</div>
			</div>
		</div>

		<div class="right span1">
			<div class="block mb2">
				<h3>Search Engine Optimisation</h3>
				<div class="block_inner">
					<div class="group{if isset($errors.page_url)} error{/if}">
						<label for="page_url">URL</label>
						<input type="text" name="page_url" id="page_url" size="32" value="{if isset($defaults.page_url)}{$defaults.page_url}{/if}" />
						<span class="suggestion">{if isset($errors.page_url)}{$errors.page_url}{/if}</span>
					</div>
					<div class="group{if isset($errors.page_page_title)} error{/if}">
						<label for="page_page_title">Page title</label>
						<input type="text" name="page_page_title" id="page_page_title" size="32" value="{if isset($defaults.page_page_title)}{$defaults.page_page_title}{/if}" />
					</div>
					<div class="group">
						<label for="page_keywords">Keywords</label>
						<textarea id="page_description" name="page_description" rows="6" cols="30">{if isset($defaults.page_description)}{$defaults.page_description}{/if}</textarea>
					</div>
					<div class="group">
						<label for="page_description">Description</label>
						<textarea id="page_keywords" name="page_keywords" rows="6" cols="30">{if isset($defaults.page_keywords)}{$defaults.page_keywords}{/if}</textarea>
					</div>
					<div class="group_submit">
						<button type="submit"><span>{if isset($current_page)}Save changes{else}Save page{/if}</span></button>
					</div>
				</div>
			</div>

		</div>
	</form>
</div><!-- #content -->
{literal}
	<script type="text/javascript">
		SIKBase.editor();
	</script>
{/literal}
{literal}
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#page_title').focus();
				
				$("#publish_form").validate({
					rules: {
						page_title: { required: true },
						page_content: { required: true },
						page_url: { required: true },
						page_page_title: { required: true }
					},
					messages: {
						page_title: '',
						page_content: '',
						page_url: '',
						page_page_title: ''
					}
				});
			});
		</script>
		{/literal}
{include file="footer.tpl"}