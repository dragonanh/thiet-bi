/**
 * Created by JetBrains PhpStorm.
 * User: tuanbm
 * Date: 8/31/12
 * Time: 5:12 PM
 * To change this template use File | Settings | File Templates.
 */

CKEDITOR.plugins.add( 'keengsong',
    {
//        requires: ['dialog'], //requires a dialog window
        init: function( editor )
        {
            // Plugin logic goes here...
//            editor.addCommand( 'imzDialog', new CKEDITOR.dialogCommand( 'imzDialog' ) );
            var b="keengsong";
            var c=editor.addCommand(b,new CKEDITOR.dialogCommand(b));
            c.modes={wysiwyg:1,source:1}; //Enable our plugin in both modes
            c.canUndo=true;

            editor.addCommand( "keengsong",
            {
                exec : function( editor )
                {
                    createTemplateAddKeeng(editor.name);

                },
                canUndo : true
            });

            //add new button to the editor
            editor.ui.addButton("keengsong",
                {
                    label:'Thêm dữ liệu Keeng',
                    command:b,
                    icon:this.path+"images/icon.png"
                }
            );
//            CKEDITOR.dialog.add(b,this.path+"dialogs/keengsong.js") //path of our dialog file
//            showModalSearchForCkEditor();
        }
    } );
var templateCkEditorSearch = "";
function createTemplateAddKeeng(editorName){
    if(templateCkEditorSearch!=""){
        showModalSearchForCkEditor();
        return;
    }
    $.post("/admin.php/ajax/searchTemplateForCkEditor",{
        editorName:editorName
    },function(result){
        $('body').append(result);
        templateCkEditorSearch = result;
        showModalSearchForCkEditor();
    });
}
//tuanbm
//code CKeditor
function showModalSearchForCkEditor(){
    $("#CkEditorModal").modal('show');
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
}
////////////////////// SEARCH SONG ///////////////////////////////////
function CkEditorSearchSong(editorName){
    //alert("Searching");
    
    var keywordSong = $.trim($("#CkEditorModal input#ckeditor_song").val());
    var keywordSinger = $.trim($("#CkEditorModal input#ckeditor_singer").val());
    if(keywordSong==""&&keywordSinger==""){
        alert("Bạn phải nhập ít nhất 1 trường dữ liệu trước khi tìm kiếm");
        return;
    }
    CkEditorAjaxSongSearch(editorName,keywordSong,keywordSinger,1);
}
function CkEditorAjaxSongSearch(editorName,keywordSong,keywordSinger,pageIndex){
    $('#search_song_loading').show();
    $.post("/admin.php/ajax/searchSongForCkEditor",{
        keywordSong:keywordSong,
        keywordSinger:keywordSinger,
        editorName: editorName,
        pageIndex:pageIndex
    },function(result){
        $('#search_song_loading').hide();
        $('#CkEditorModal #ckeditor_song_result').html(result);
    }
    );
//        $('#search_song_loading').hide();
}
function CkEditorMoveSongPage(editorName,pageIndex){
    //alert("Searching");
    var keywordSong = $.trim($("#CkEditorModal input#ckeditor_song_hidden").val());
    var keywordSinger = $.trim($("#CkEditorModal input#ckeditor_singer_hidden").val());
    //Set lai du lieu
    $("#CkEditorModal input#ckeditor_song").val(keywordSong);
    $("#CkEditorModal input#ckeditor_singer").val(keywordSinger);
    //
    CkEditorAjaxSongSearch(editorName,keywordSong,keywordSinger,pageIndex);
}

function CkEditorInsertSongCode(editorName,code){
    var e = CKEDITOR.instances[editorName];
    e.insertHtml("<div>[keengsong]"+code+"[/keengsong]</div>");
}

////////////////////// SEARCH VIDEO ///////////////////////////////////

function CkEditorSearchVideo(editorName){
    //alert("Searching");
    var keywordVideo = $.trim($("#CkEditorModal input#ckeditor_video").val());
//    var keywordSinger = $.trim($("#CkEditorModal input#ckeditor_singer").val());
    if(keywordVideo==""){
        alert("Bạn phải nhập dữ liệu trước khi tìm kiếm");
        return;
    }
    CkEditorAjaxVideoSearch(editorName,keywordVideo,1);
}
function CkEditorAjaxVideoSearch(editorName,keywordVideo,pageIndex){
    $('#search_video_loading').show();
    $.post("/admin.php/ajax/searchVideoForCkEditor",{
        keywordVideo:keywordVideo,
        editorName: editorName,
        pageIndex:pageIndex
    },function(result){
        $('#search_video_loading').hide();
        $('#CkEditorModal #ckeditor_video_result').html(result);
    });
}
function CkEditorMoveVideoPage(editorName,pageIndex){
    //alert("Searching");
    var keywordVideo = $.trim($("#CkEditorModal input#ckeditor_video_hidden").val());
    //Set lai du lieu
    $("#CkEditorModal input#ckeditor_video").val(keywordVideo);
    //
    CkEditorAjaxVideoSearch(editorName,keywordVideo,pageIndex);
}

function CkEditorInsertVideoCode(editorName,code){
    var e = CKEDITOR.instances[editorName];
    e.insertHtml("<div>[keengvideo]"+code+"[/keengvideo]</div>");
}
//////////////////////// SEARCH SURVEY ///////////////////////////////
function CkEditorSearchSurvey(editorName){
    //alert("Searching");
    var keywordSurvey = $.trim($("#CkEditorModal input#ckeditor_survey").val());
//    var keywordSinger = $.trim($("#CkEditorModal input#ckeditor_singer").val());
    if(keywordSurvey==""){
        alert("Bạn phải nhập dữ liệu trước khi tìm kiếm");
        return;
    }
    CkEditorAjaxSurveySearch(editorName,keywordSurvey,1);
}
function CkEditorAjaxSurveySearch(editorName,keywordSurvey,pageIndex){
    $('#search_survey_loading').show();
    $.post("/admin.php/ajax/searchSurveyForCkEditor",{
        keywordSurvey:keywordSurvey,
        editorName: editorName,
        pageIndex:pageIndex
    },function(result){
        $('#search_survey_loading').hide();
        $('#CkEditorModal #ckeditor_survey_result').html(result);
    });
}
function CkEditorMoveSurveyPage(editorName,pageIndex){
    //alert("Searching");
    var keywordSurvey = $.trim($("#CkEditorModal input#ckeditor_survey_hidden").val());
    //Set lai du lieu
    $("#CkEditorModal input#ckeditor_survey").val(keywordSurvey);
    //
    CkEditorAjaxSurveySearch(editorName,keywordSurvey,pageIndex);
}

function CkEditorInsertSurveyCode(editorName,code){
    var e = CKEDITOR.instances[editorName];
    e.insertHtml("<div>[keengsurvey]"+code+"[/keengsurvey]</div>");
}
