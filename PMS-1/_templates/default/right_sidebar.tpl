<div id="body-right">
<h3>Latest <span>News</span></h3>

{foreach from=$news_list item=one_news}

{if $one_news.thumb!=""}
<div class="news"> 
	<a href="{$BASE_URL}news/{$one_news.id}/{$one_news.varname}/">
		<img src="{$BASE_URL}img/{$one_news.thumb}" width="98" height="66" align="left" />
	</a>
	<p>
		<a class="title" href="{$BASE_URL}news/{$one_news.id}/{$one_news.varname}/"><span>{$one_news.title}</span></a>
	</p>
</div>
{else}
<div class="news" style="height: auto;"> 
	<p>
		<a class="title" href="{$BASE_URL}news/{$one_news.id}/{$one_news.varname}/"><span>{$one_news.title}</span></a>
	</p>
</div>
{/if}

<div style="clear: both"></div>
{foreachelse}
No News
{/foreach}


<h3>Testimonials</h3>
<div class="testi">
<p>"{$random_testimonial.text}"</p>
<p><span>{$random_testimonial.name}</span></p>
</div>
</div>