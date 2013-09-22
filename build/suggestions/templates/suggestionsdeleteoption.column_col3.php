<?php
$formkit = $this->layoutkit->formkit;
$callbackTags = $formkit->setPostCallback('SuggestionsController', 'deleteOptionCallback');
$layoutbits = new Mod_layoutbits();
$request = PRequest::get()->request;
$purifier = MOD_htmlpure::getSuggestionsHtmlPurifier();
include 'suggestionserrors.php';
$vars = $this->getRedirectedMem('vars');
if (empty($vars)) {
    $vars['suggestion-option-id'] = $this->option->id;
	$vars['suggestion-option-summary'] = $this->suggestion->options[$this->optionId]->summary;
    $vars['suggestion-option-desc'] = $this->suggestion->options[$this->optionId]->description;
}
if (!isset($this->disableTinyMCE) || ($this->disableTinyMCE == 'No')) {
    $textarea = 'suggestion-option-desc';
    require_once SCRIPT_BASE . 'htdocs/script/tinymceconfig.js';
}

// Show suggestion head (as on every page)
include 'suggestion.php';
?>
<div id='suggestion-form'>
<form method="post" id="suggestion-addoptions-form">
<?php echo $callbackTags; ?>
<div class="subcolumns row">
<h3><?php echo $purifier->purify($this->option->summary);?></h3>
</div>
<div class="subcolumns">
    <div class="c62l">
        <div class="subcl">
            <div class="row">
            <?php echo $purifier->purify($this->option->description);?>
        </div>
    </div>
</div>
<div class="c38r">
    <div class="subcl">
        <div class="row">
        </div>
    </div>
</div>
<div class="subcolumns row">
<p><?php echo $words->get('SuggestionsReallyDeleteOption');?></p>
<input type="hidden" id="suggestion-id" name="suggestion-id" value="<?php echo $this->suggestion->id; ?>" />
<input type="hidden" id="suggestion-option-id" name="suggestion-option-id" value="<?php echo $vars['suggestion-option-id']; ?>" />
<input type="submit" id="suggestion-delete-option" name="suggestion-delete-option"
    value="<?php echo $words->getSilent('SuggestionsSubmitDeleteOption'); ?>" class="submit" /><?php echo $words->flushBuffer(); ?>
</div>
</form>
</div><!-- suggestion-form -->
<?php
// Now load the board and show it
$Forums = new ForumsController;
$Forums->showExternalSuggestionsThread( $this->suggestion->id, $this->model->getGroupId(), $this->suggestion->threadId);
?>
