(function ()
{


    var mceUrl = '';
	// create pxShortcodes plugin
	tinymce.create("tinymce.plugins.pxShortcodes",
	{
		init: function ( ed, url )
		{
		    mceUrl = url;

			ed.addCommand("pxPopup", function ( a, params ){
                var title = 'Shortcode';

                if(typeof params.title != 'undefined')
                    title =  params.title;

                jQuery.pxmodal({
                    title: title,
                    url:   ajaxurl + "?action=px_sc_popup&type=" + params.type,
                    load:  jQuery.px.scpopup.load
                });
			});
		},
		createControl: function ( button, e )
		{
			if ( button != "px_button" )
                return null;
					
			// adds the tinymce button
			button = e.createMenuButton("px_button",
			{
				title: "Insert Shortcode",
				image: mceUrl + "/images/icon.png",
				icons: false
			});
			
            var plugin = this;	

			// adds the dropdown to the button
			button.onRenderMenu.add(function (c, b)
			{
                c = b.addMenu({ title: "Page Elements" });

                plugin.addPopupMenuButton(c, "LayerSlider", "layerslider");

                c.addSeparator();
				
                plugin.addPopupMenuButton(c, "Video YouTube", "video_youtube");
                plugin.addPopupMenuButton(c, "Video Vimeo", "video_vimeo");
				
                c.addSeparator();

                plugin.addPopupMenuButton(c, "Audio SoundCloud", "audio_soundcloud");

                c.addSeparator();

				plugin.addPopupMenuButton(c, "Image Box", "imagebox");
				plugin.addPopupMenuButton(c, "Text Box", "textbox");
				plugin.addPopupMenuButton(c, "Icon Box", "iconbox_top_noborder");
				
				c.addSeparator();
				plugin.addPopupMenuButton(c, "CounterBox", "conterbox");
				c.addSeparator();
                plugin.addPopupMenuButton(c, "Pie chart", "piechart");
				
				c.addSeparator();
				
                plugin.addPopupMenuButton(c, "Social Link", "socialLink");
				plugin.addPopupMenuButton(c, "Button", "button");
				
                c.addSeparator();

                plugin.addPopupMenuButton(c, "Separator", "separator");
                plugin.addPopupMenuButton(c, "Title Separator", "title_separator");
				
                c.addSeparator();

                plugin.addPopupMenuButton(c, "Team Member", "team_member");
                plugin.addPopupMenuButton(c, "Team Member Icon", "team_icon");

                c = b.addMenu({ title: "Tabs and Toggles" });

                plugin.addImmediateMenuButton(c, "Tab Group", "[tab_group]<br />[/tab_group]");
                plugin.addImmediateMenuButton(c, "Tab", "[tab title='Tab'][/tab]");

                c.addSeparator();

                plugin.addImmediateMenuButton(c, "Accordion", "[accordion]<br />[/accordion]");
                plugin.addPopupMenuButton(c, "Accordion Tab", "accordion_tab");

                c.addSeparator();

                plugin.addImmediateMenuButton(c, "Toggle", "[toggle]<br />[/toggle]");
                plugin.addPopupMenuButton(c, "Toggle Tab", "toggle_tab");


                c = b.addMenu({ title: "Layout Elements" });
				
				plugin.addPopupMenuButton(c, "1/2 + 1/2", "row66");
				plugin.addPopupMenuButton(c, "1/3 + 1/3 + 1/3", "row444");
				plugin.addPopupMenuButton(c, "2/3 + 1/3", "row84");
				plugin.addPopupMenuButton(c, "1/4 + 1/4 + 1/4 + 1/4", "row3333");
				plugin.addPopupMenuButton(c, "3/4 + 1/4", "row93");
				
                c.addSeparator();

                plugin.addImmediateMenuButton(c, "Container", "[container]<br />[/container]");
                plugin.addPopupMenuButton(c, "Color Section", "section_alt");

                c.addSeparator();

                plugin.addPopupMenuButton(c, "Row", "row");

                for(var i=1; i<=12;i++)
                    plugin.addImmediateMenuButton(c, "Span " + i, "[span"+i+" offset=''][/span"+i+"]");
			});
				
			return button;
		},
		addPopupMenuButton: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("pxPopup", false, { title: title, type: id } )
				}
			})
		},
		addImmediateMenuButton: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'PixFlow Shortcodes',
				author: 'Mohsen Heydari',
				authorurl: 'http://themeforest.net/user/pixflow/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add pxShortcodes plugin
	tinymce.PluginManager.add("pxShortcodes", tinymce.plugins.pxShortcodes);
})();