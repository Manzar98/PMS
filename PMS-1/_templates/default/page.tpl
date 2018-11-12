{include file="header.tpl"}
		<div id="main-body">
			<div id="body-left">
			<div class="page">
			<h3 class="page-heading">{$page.title}</h3>
			{$page.content}
			
			{if $page.url == 'contact'}
			<iframe style="float: left;" width="375" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
			src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;z=15&amp;geocode=&amp;q=Premium+Community+care+Ltd,+86+Digbeth,+Birmingham,+B5+6DY,+United+Kingdom&amp;aq=0&amp;oq=premium+&amp;sll=52.475747,-1.887548&amp;sspn=0.007228,0.021136&amp;vpsrc=0&amp;gl=pk&amp;g=Birmingham+B5+6DY,+UK&amp;ie=UTF8&amp;hq=Premium+Community+care+Ltd,&amp;hnear=86+Digbeth,+Birmingham,+West+Midlands+B5+6DY,+United+Kingdom&amp;ll=52.475749,-1.887546&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=&amp;output=embed"></iframe>
			
			
			{/if}
			{if $page.has_form == '1'}
			{if $errors}
			<div class="validation-failure">
				{$errors.contact_error}
			</div>
			{elseif $smarty.session.contact_msg_sent == 1}
			<div class="apply-status-ok">
				{$page.form_message}
			</div>
			{/if}
			{if $smarty.session.contact_msg_sent != 1}
			<div id="contact-form" class="map">
				<div id="contact-form-contents">
					<form id="contact-online" {if $page.url=='contact'} style="padding-top:0px;" {/if} method="post" action="{$BASE_URL}{$page.url}/">
						<label for="contact_name">{$translations.contact.name_label}:</label><br />
						<input {if $errors.contact_name}class="error"{/if} type="text" name="contact_name" id="contact_name" maxlength="50" size="30" value="{$smarty.post.contact_name}" />
						<span class="validation-error">{if $errors.contact_name}<img src="{$BASE_URL}_templates/{$THEME}/img/icon-delete.png" alt="" />{/if}</span>	
						<br /><br />
						<label for="contact_email">{$translations.contact.email_label}:</label><br />
						<input {if $errors.contact_email}class="error"{/if} type="text" name="contact_email" id="contact_email" maxlength="50" size="30" value="{$smarty.post.contact_email}" />
						<span class="validation-error">{if $errors.contact_email}<img src="{$BASE_URL}_templates/{$THEME}/img/icon-delete.png" alt="" />{/if}</span>	
						<br /><br />
						<label for="contact_msg">{$translations.contact.message_label}:</label><br />
						<textarea {if $page.url=='contact'} style="width:300px !important;" {/if} {if $errors.contact_msg}class="error"{/if} name="contact_msg" id="contact_msg" cols="50" rows="8">{$smarty.post.contact_msg}</textarea>
						<span class="validation-error">{if $errors.contact_msg}<img src="{$BASE_URL}_templates/{$THEME}/img/icon-delete.png" alt="" />{/if}</span>
						{if $ENABLE_RECAPTCHA}
							<br /><br />
							<label for="recaptcha_response_field">{$translations.captcha.captcha_title}:</label><br />
							{literal}
							<script type="text/javascript">
							  var RecaptchaOptions = {
							    theme : 'white',
							    tabindex : 9
							  };
							</script>
							{/literal}
							{$the_captcha}
							<span class="validation-error">{if $errors.captcha}<img src="{$BASE_URL}_templates/{$THEME}/img/icon-delete.png" alt="" /> {$errors.captcha}{/if}</span>
						{/if}
						<br /><br />
						<input type="submit" name="submit" id="submit" value="{$translations.contact.submit}" />
					</form>
				</div><!-- #contact-form-contents -->
				{/if}
			</div><!-- #contact-form -->
			{/if}
</div>
</div>
<!-- #sidebar -->

	
		{if $page.has_form == '1'}
		{literal}
		<script type="text/javascript">
	 		$(document).ready(function()
			{
				$("#contact-online").validate({
					rules: {
						contact_name: { required: true },
						contact_email: { required: true, email: true },
						contact_msg: { required: true }
					},
					messages: {
						contact_name: ' <img src="{/literal}{$BASE_URL}_templates/{$THEME}/{literal}img/icon-delete.png" alt="" />',
						contact_email: ' <img src="{/literal}{$BASE_URL}_templates/{$THEME}/{literal}img/icon-delete.png" alt="" />',
						contact_msg: ' <img src="{/literal}{$BASE_URL}_templates/{$THEME}/{literal}img/icon-delete.png" alt="" />'
					}
				});
			});
		</script>
		{/literal}
		{/if}

{include file="footer.tpl"}