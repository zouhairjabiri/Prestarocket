{foreach from=$result item=review}
<div class="alert alert-success" role="alert">
  <p> {$review.titre} !</p> {$review.contenu}
</div>
{/foreach}

