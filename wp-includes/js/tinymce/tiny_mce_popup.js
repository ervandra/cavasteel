/**
 * tinymce_mce_popup.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2017 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

var tinymce, tinyMCE;

/**
 * TinyMCE popup/dialog helper class. This gives you easy access to the
 * parent editor instance and a bunch of other things. It's higly recommended
 * that you load this script into your dialogs.
 *
 * @static
 * @class tinyMCEPopup
 */
var tinyMCEPopup = {
  /**
   * Initializes the popup this will be called automatically.
   *
   * @method init
   */
  init: function () {
    var self = this, parentWin, settings, uiWindow;

    // Find window & API
    parentWin = self.getWin();
    tinymce = tinyMCE = parentWin.tinymce;
    self.editor = tinymce.EditorManager.activeEditor;
    self.params = self.editor.windowManager.getParams();

    uiWindow = self.editor.windowManager.windows[self.editor.windowManager.windows.length - 1];
    self.features = uiWindow.features;
    self.uiWindow = uiWindow;

    settings = self.editor.settings;

    // Setup popup CSS path(s)
    if (settings.popup_css !== false) {
      if (settings.popup_css) {
        settings.popup_css = self.editor.documentBaseURI.toAbsolute(settings.popup_css);
      } else {
        settings.popup_css = self.editor.baseURI.toAbsolute("plugins/compat3x/css/dialog.css");
      }
    }

    if (settings.popup_css_add) {
      settings.popup_css += ',' + self.editor.documentBaseURI.toAbsolute(settings.popup_css_add);
    }

    // Setup local DOM
    self.dom = self.editor.windowManager.createInstance('tinymce.dom.DOMUtils', document, {
      ownEvents: true,
      proxy: tinyMCEPopup._eventProxy
    });

    self.dom.bind(window, 'ready', self._onDOMLoaded, self);

    // Enables you to skip loading the default css
    if (self.features.popup_css !== false) {
      self.dom.loadCSS(self.features.popup_css || self.editor.settings.popup_css);
    }

    // Setup on init listeners
    self.listeners = [];

    /**
     * Fires when the popup is initialized.
     *
     * @event onInit
     * @param {tinymce.Editor} editor Editor instance.
     * @example
     * // Alerts the selected contents when the dialog is loaded
     * tinyMCEPopup.onInit.add(function(ed) {
     *     alert(ed.selection.getContent());
     * });
     *
     * // Executes the init method on page load in some object using the SomeObject scope
     * tinyMCEPopup.onInit.add(SomeObject.init, SomeObject);
     */
    self.onInit = {
      add: function (func, scope) {
        self.listeners.push({ func: func, scope: scope });
      }
    };

    self.isWindow = !self.getWindowArg('mce_inline');
    self.id = self.getWindowArg('mce_window_id');
  },

  /**
   * Returns the reference to the parent window that opened the dialog.
   *
   * @method getWin
   * @return {Window} Reference to the parent window that opened the dialog.
   */
  getWin: function () {
    // Added frameElement check to fix bug: #2817583
    return (!window.frameElement && window.dialogArguments) || opener || parent || top;
  },

  /**
   * Returns a window argument/parameter by name.
   *
   * @method getWindowArg
   * @param {String} name Name of the window argument to retrieve.
   * @param {String} defaultValue Optional default value to return.
   * @return {String} Argument value or default value if it wasn't found.
   */
  getWindowArg: function (name, defaultValue) {
    var value = this.params[name];

    return tinymce.is(value) ? value : defaultValue;
  },

  /**
   * Returns a editor parameter/config option value.
   *
   * @method getParam
   * @param {String} name Name of the editor config option to retrieve.
   * @param {String} defaultValue Optional default value to return.
   * @return {String} Parameter value or default value if it wasn't found.
   */
  getParam: function (name, defaultValue) {
    return this.editor.getParam(name, defaultValue);
  },

  /**
   * Returns a language item by key.
   *
   * @method getLang
   * @param {String} name Language item like mydialog.something.
   * @param {String} defaultValue Optional default value to return.
   * @return {String} Language value for the item like "my string" or the default value if it wasn't found.
   */
  getLang: function (name, defaultValue) {
 