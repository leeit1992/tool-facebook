<?php

namespace App\Http\Components\Backend;

/**
 * Handle media manage.
 *
 * @version  1.0
 * @author  HaLe 
 * @package  ATL
 */
class AdminEditor
{   
    /**
     * $getInstance - Support singleton module.
     * @var null
     */
    private static $getInstance = null;

    protected static $route = null;

    private function __wakeup(){}

    private function __clone(){}

    private function __construct(){}

    public static function getInstance( $route = null )
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        self::$route = $route;

        return self::$getInstance;
    }

    public function init( $name, $value = '', $id = false ){
        $idItem = $name;
        $selector = 'textarea[name='.$name.']';
        if( $id ) {
            $idItem = $id;
            $selector = '#'.$id;
        }
        ?>
        <textarea id="<?php echo $idItem ?>" name="<?php echo $name ?>"><?php echo $value ?></textarea>
        <script type="text/javascript">
            tinymce.init({
                selector: "<?php echo $selector ?>",
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                     "save contextmenu directionality emoticons template paste textcolor moxiemanager"
                ],
                branding: false,

                external_plugins: {
                    "moxiemanager": ATLDATA.SITE_URI + '/public/backend/bower_components/moxiemanager/plugin.min.js'
                },

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify bullist numlist forecolor | outdent indent | link | image | moxiemanager | openListDescTemp | saveIntinerary", 
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],
                setup: function (editor) {
                    editor.addButton('openListDescTemp', {
                        icon: 'mce-ico mce-i-template',
                        title: "Open list template intinerary.",
                        onclick: function () {
                            $(".atl-intinerary-desc-template").show();
                        }
                    });
                    editor.addButton('saveIntinerary', {
                        icon: 'mce-ico mce-i-save',
                        title: "Save description intinerary to template.",
                        onclick: function () {
                            var modal = UIkit.modal("#atl-intinerary-save-desc");
                            $(".atl-intinerary-desc-content").html(editor.getContent());
                            modal.show();

                            // $("#atl-intinerary-save-desc").trigger('click');
                            // editor.insertContent('&nbsp;<b>It\'s my button!</b>&nbsp;');
                        }
                    });
                }
            });
        </script>
        <?php
    }

  
}
