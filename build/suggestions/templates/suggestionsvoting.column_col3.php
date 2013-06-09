<?php
$ranks = array(
        4 => $words->getSilent('SuggestionsExcellent'), 
        3 => $words->getSilent('SuggestionsGood'), 
        2 => $words->getSilent('SuggestionsFair'), 
        1 => $words->getSilent('SuggestionsPoor')
    );
$formkit = $this->layoutkit->formkit;
$purifier = MOD_htmlpure::getActivitiesHtmlPurifier();
$callbackTags = $formkit->setPostCallback('SuggestionsController', 'voteSuggestionCallback');
$errors = $this->getRedirectedMem('errors');
$vars = $this->getRedirectedMem('vars');
if (empty($vars)) {
    $vars['suggestion-id'] = $this->suggestion->id;
    $vars['suggestion-summary'] = $this->suggestion->summary;
    $vars['suggestion-description'] = $this->suggestion->description;
    if (count($this->votes) == 0) {
        $votes = array(); 
        foreach($this->suggestion->options as $option) {
            $vars['option' . $option->id . 'rank'] = 0;
            $vote = new StdClass;
            $vote->rank = 0;
            $votes[$option->id] = $vote;
        }
        $this->votes = $votes;
    } else {
        foreach($this->votes as $key => $value) {
            $vars['option' . $key . 'rank'] = $value->rank;
        }
    }
}
?>
<div>
<fieldset id="suggestion-vote"><legend><?php echo $words->get('SuggestionsVote'); ?></legend>
<form method="post" id="suggestion-vote-form">
<input type="hidden" id="suggestion-id" name="suggestion-id" value="<?php echo $vars['suggestion-id']; ?>" />
<?php echo $callbackTags;
if (!empty($errors)) {
    $errStr = '<div class="error">';
    foreach ($errors as $error) {
        $parts = explode("###", $error);
        if (count($parts) > 1) {
            $errStr .= $words->get($parts[0], $parts[1]);
        } else {
            $errStr .= $words->get($error);
        }
        $errStr .=  "<br />";
    }
    $errStr = substr($errStr, 0, -6) . '</div>';
    echo $errStr;
}
?>
    <h3><?php echo $purifier->purify($this->suggestion->summary); ?></h3>
    <p><?php echo $purifier->purify($this->suggestion->description); ?></p>
    <?php foreach($this->suggestion->options as $option) : ?><div class="subcolumns">
    <div class="row"><div class="c50l"><div class="subcl"><strong><?php echo $option->summary;?></strong></div></div>
    <div class="c50r"><div class="subcr"><?php foreach($ranks as $key => $rank) :
        $name = "option" . $option->id . 'rank'; $id= $name . $rank; ?><label class="button" for="<?php echo $id; ?>"><input type="radio" class="toggle" 
        <?php if ($key == $this->votes[$option->id]->rank) { echo 'checked="checked"'; } ?> id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $key; ?>" /><?php echo $rank; ?></label>
    <?php endforeach; ?>
        </div></div></div></div>
    <?php endforeach; ?>
    <p><?php echo $words->get('SuggestionsVoteHint');?></p>
    <p><input type="submit" class="button float_right" name="suggestion-vote-submit" value="<?php echo $words->getSilent('SuggestionsVoteSubmit'); ?>" /><?php echo $words->flushBuffer(); ?></p>
</form>
</fieldset>
</div>
