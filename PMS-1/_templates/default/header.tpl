<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{if isset($seo_title)}{$seo_title}{else}{$html_title}{/if}</title>
<link rel="stylesheet" type="text/css" href="{$BASE_URL}_templates/{$THEME}/css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="{$BASE_URL}_templates/{$THEME}/css/jquery-ui-1.8.17.custom.css"/>

<script src="{$BASE_URL}_templates/{$THEME}/js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="{$BASE_URL}_templates/{$THEME}/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{$BASE_URL}_templates/{$THEME}/js/jquery-ui-1.8.17.custom.min.js"></script>

</head>
<body>

<div id="fb-root"></div>
{literal}
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=198157676907872";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
{/literal}
<div id="wrap">

<div id="main-body">


<div class="home">
<div id="header">

<div id="logo-placeholder">
	<h1><img style="float:right;" src="{$BASE_URL}_templates/{$THEME}/img/bg_logo.png" alt="Shamal TV" /></h1>
</div>
<div class="clear"></div>
<div id="navigation">

{if (isset($LINKS_TYPE) && $LINKS_TYPE=='Links')}
<ul>
{foreach from=$navigation.secondary item=nav}
<li><a {if $CURRENT_PAGE=='{$nav.name}'}class="current"{/if} href="{if $nav.outside==0} {$BASE_URL}{$nav.url}{else} {$nav.url} {/if}">{$nav.name}</a></li>
{/foreach}
</ul>	
{else}	
<ul>	
<li><a href="{$BASE_URL}">Home</a></li>
<li><a {if $CURRENT_PAGE=='videos'}class="current"{/if}  href="{$BASE_URL}videos/" >Videos</a></li>
<li><a {if $CURRENT_PAGE=='shows'}class="current"{/if} href="{$BASE_URL}shows/"> Shows </a></li>
{foreach from=$web_pages item=page}
<li><a {if $CURRENT_PAGE==$page}class="current"{/if} href="{$BASE_URL}{$page.url}/">{$page.title}</a></li>
{/foreach}
</ul>
{/if}
</div>
<div class="clear"></div>
