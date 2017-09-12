tinyMCE.addI18n({en:{
    textwithbox:
        {
            insert_text_with_box : "Insert text with box"
        }
}});

(function() {
    tinymce.create('tinymce.plugins.TextWithBoxPlugin', {
        /**
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            var t = this;
            t.editor = ed;
            ed.contentCSS = [ed.settings.magentoPluginsOptions._object.textwithbox.css];
            ed.addCommand('mceTextwithbox', t._insertTextWithBox, t);
            ed.addButton('textwithbox', {
                title : 'textwithbox.insert_text_with_box',
                cmd : 'mceTextwithbox',
                image : url + '/img/icon.gif'
            });
        },

        getInfo : function() {
            return {
                longname : 'Demo Text with Box Plugin for TinyMCE 3.x',
                author : 'Marcel Hauri',
                authorurl : 'https://blog.hauri.me/how-to-add-a-tinymce-plugin-to-the-magento2-wysiwyg-editor.html',
                infourl : 'https://github.com/mhauri/magento2-demo-tinymce-plugin',
                version : "1.0"
            };
        },

        _insertTextWithBox : function () {
            var ed = this.editor;
            ed.execCommand('mceInsertContent', false, '<div class="textwithbox">' +
                '<div class="textwithbox-left">Left ...</div>' +
                '<div class="textwithbox-right">Right ...</div>' +
                '</div>');
        }
    });

    // Register plugin
    tinymce.PluginManager.add('textwithbox', tinymce.plugins.TextWithBoxPlugin);
})();
