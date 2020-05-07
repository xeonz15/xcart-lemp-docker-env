/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Reloadable layout block widget controller
 *
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

function InlineEditableController()
{
  this.init();

  core.bind('loader.loaded', _.bind(this.reset, this));
  core.bind('inline_editor.disable', _.bind(this.destroy, this));
  core.bind('inline_editor.enable', _.bind(this.reset, this));
}

InlineEditableController.prototype.selector = '[data-inline-editable]';

InlineEditableController.prototype.buildChangeRecord = function (element) {
  element = $(element);
  return {
    model: element.data('model'),
    identifier: element.data('identifier'),
    property: element.data('property'),
    value: element.froalaEditor('html.get')
  };
};

InlineEditableController.prototype.init = function () {
  $(this.selector).froalaEditor(this.getEditorOptions());
  $(this.selector).on('froalaEditor.contentChanged', _.bind(this.onContentChanged, this));
  $(this.selector).on('froalaEditor.image.inserted froalaEditor.image.replaced', _.bind(this.onImageInserted, this));
};

InlineEditableController.prototype.getEditorOptions = function () {
  return $(this.selector).data('inline-editor-config');
};

InlineEditableController.prototype.destroy = function () {
  if ($(this.selector).data('froala.editor')) {
    $(this.selector).froalaEditor('destroy');
  }
};

InlineEditableController.prototype.reset = function () {
  this.destroy();
  this.init();
};

InlineEditableController.prototype.onContentChanged = function (event, editor) {
  core.trigger('inline_editor.changed', {
    event: event,
    sender: this,
    change: this.buildChangeRecord(event.currentTarget),
    fieldId: $(event.currentTarget).data('property')
  });
};

InlineEditableController.prototype.onImageInserted = function (event, editor, element, response) {
  core.trigger('inline_editor.image.inserted', {
    event: event,
    sender: this,
    imageId: JSON.parse(response).id,
    imageElement: element
  });
};

InlineEditableController.prototype.getFullChangeset = function() {
  var changeset = {};
  if ($(this.selector).data('froala.editor')) {
    $(this.selector).each(function() {
      changeset[$(this).data('property')] = $(this).froalaEditor('html.get');
    })
  }

  return changeset;
}

core.autoload(InlineEditableController);

