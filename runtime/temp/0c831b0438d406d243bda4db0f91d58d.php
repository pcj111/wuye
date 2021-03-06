<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"F:\twothink\TwoThink\addons\webuploader\content.html";i:1521712368;}*/ ?>
<link rel="stylesheet" type="text/css" href="__ADDONS__/webuploader/webuploader/webuploader.css">
<link rel="stylesheet" type="text/css" href="__ADDONS__/webuploader/css/style.css" />
<style>
    .addon_webuploader .placeholder {
        text-align: center;
        color: #cccccc;
        font-size: 18px;
        position: relative;
    }
    .addon_webuploader .webuploader_container{
        border: 1px solid #dadada;
        color: #838383;
        font-size: 12px;
        margin-top: 10px;
        background-color: #FFF;
    }
    .addon_webuploader .filelist {
        list-style: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    .addon_webuploader .filelist li {
        width: 110px;
        height: 110px;
        border: 3px dashed #e6e6e6;
        background: url(__ADDONS__/webuploader/images/image.png) center no-repeat !important;
        text-align: center;
        margin: 0 8px 8px 0;
        position: relative;
        display: inline;
        float: left;
        overflow: hidden;
        font-size: 12px;
    }
    .addon_webuploader .filelist li p.title {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        top: 5px;
        text-indent: 5px;
        text-align: left;
    }
    .addon_webuploader .filelist li p.imgWrap {
        position: relative;
        z-index: 2;
        line-height: 110px;
        vertical-align: middle;
        overflow: hidden;
        width: 110px;
        height: 110px;
        -webkit-transform-origin: 50% 50%;
        -moz-transform-origin: 50% 50%;
        -o-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        -webit-transition: 200ms ease-out;
        -moz-transition: 200ms ease-out;
        -o-transition: 200ms ease-out;
        -ms-transition: 200ms ease-out;
        transition: 200ms ease-out;
    }
    .addon_webuploader .filelist li p.progress {
        position: absolute;
        width: 100%;
        bottom: 0;
        left: 0;
        height: 8px;
        overflow: hidden;
        z-index: 50;
        margin: 0;
        border-radius: 0;
        background: none;
        -webkit-box-shadow: 0 0 0;
    }
    .addon_webuploader .filelist div.file-panel {
        position: absolute;
        height: 0;
        filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#80000000', endColorstr='#80000000')�;
        background: rgba( 0, 0, 0, 0.5 );
        width: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 300;
    }
</style>
<div class="addon_webuploader" id="uploaderWidth_<?php echo $addons_param['name']; ?>">
    <div class="webuploader_container">
        <div id="uploade_<?php echo $addons_param['name']; ?>" class="uploader">
            <div class="valuefilelist">
                <?php $__FOR_START_8275__=0;$__FOR_END_8275__=$addons_config['param']['number'];for($i=$__FOR_START_8275__;$i < $__FOR_END_8275__;$i+=1){ ?>
                <input class="text input-mid" type="hidden" name="<?php echo $addons_config['param']['number']>1?$addons_param['name'].'[]' : $addons_param['name']; ?>" value="<?php echo (isset($addons_param['value'][$i]) && ($addons_param['value'][$i] !== '')?$addons_param['value'][$i]:''); ?>">
                <?php } ?>
            </div>
            <div class="queueList">
                <div class="dndArea placeholder" style="display: none;">
                    <div class="filePicker"></div>
                </div>
                <ul class="filelist">
                    <?php $__FOR_START_32334__=0;$__FOR_END_32334__=$addons_config['param']['number'];for($i=$__FOR_START_32334__;$i < $__FOR_END_32334__;$i+=1){ ?>
                    <li class="filelist_statuss">
                        <p class="title"></p>
                        <p class="imgWrap">
                            <?php if(isset($addons_param['value'][$i])): ?>
                            <img src="<?php echo get_cover($addons_param['value'][$i],'path'); ?>">
                            <?php endif; ?>
                        </p>
                        <p class="progress"><span></span></p>
                        <div class="file-panel" style="height: 0px;">
                            <span class="cancel">删除</span>
                            <span class="rotateRight">向右旋转</span>
                            <span class="rotateLeft">向左旋转</span>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="statusBar" style="display:none;">
                <div class="progress">
                    <span class="text">0%</span>
                    <span class="percentage"></span>
                </div><div class="info"></div>
                <div class="btns">
                    <div class="uploadBtn">开始上传</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="__ADDONS__/webuploader/webuploader/webuploader.js"></script>
<script>
$(function() {
    var $wrap = $('#uploade_<?php echo $addons_param['name']; ?>'),
        $queue = $('#uploade_<?php echo $addons_param['name']; ?> .filelist'),// 图片容器
        $valuefilelist = $('#uploade_<?php echo $addons_param['name']; ?> .valuefilelist'),// 服务器图片容器 已上传图片表单域
        $statusBar = $wrap.find( '.statusBar' ),// 状态栏，包括进度和控制按钮
        $info = $statusBar.find( '.info' ),// 文件总体选择信息。
        $upload = $wrap.find( '.uploadBtn' ),// 上传按钮
        $placeHolder = $wrap.find( '.placeholder' ),// 没选择文件之前的内容。
        $progress = $statusBar.find( '.progress' ).hide(),
        fileCount = 0,// 添加的文件数量
        fileSize = 0,// 添加的文件总大小
        ratio = window.devicePixelRatio || 1,// 优化retina, 在retina下这个值是2
        // 缩略图大小
        thumbnailWidth = 110 * ratio,
        thumbnailHeight = 110 * ratio,
        state = 'pedding',// 可能有pedding, ready, uploading, confirm, done.
        percentages = {}, // 所有文件的进度信息，key为file id
        // 判断浏览器是否支持图片的base64
        isSupportBase64 = ( function() {
            var data = new Image();
            var support = true;
            data.onload = data.onerror = function() {
                if( this.width != 1 || this.height != 1 ) {
                    support = false;
                }
            }
            data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
            return support;
        } )(),

        // 检测是否已经安装flash，检测flash的版本
        flashVersion = ( function() {
            var version;

            try {
                version = navigator.plugins[ 'Shockwave Flash' ];
                version = version.description;
            } catch ( ex ) {
                try {
                    version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                        .GetVariable('$version');
                } catch ( ex2 ) {
                    version = '0.0';
                }
            }
            version = version.match( /\d+/g );
            return parseFloat( version[ 0 ] + '.' + version[ 1 ], 10 );
        } )(),
        supportTransition = (function(){
            var s = document.createElement('p').style,
                r = 'transition' in s ||
                    'WebkitTransition' in s ||
                    'MozTransition' in s ||
                    'msTransition' in s ||
                    'OTransition' in s;
            s = null;
            return r;
        })(),
        uploader;// WebUploader实例

    $("#uploaderWidth_<?php echo $addons_param['name']; ?>").css('width',<?php echo $addons_config['param']['number']; ?>*(thumbnailWidth+14)+29);
    $(document).on('click','#uploade_<?php echo $addons_param['name']; ?> .filelist .imgWrap',function(){
        $('#uploade_<?php echo $addons_param['name']; ?> .dndArea label').click();
    });
    var click_number = 0;
    $(document).on('click','.addon_webuploader .filelist li',function(){
        click_number = $(this).index();
    });

    if ( !WebUploader.Uploader.support('flash') && WebUploader.browser.ie ) {
        // flash 安装了但是版本过低。
        if (flashVersion) {
            (function(container) {
                window['expressinstallcallback'] = function( state ) {
                    switch(state) {
                        case 'Download.Cancelled':
                            alert('您取消了更新！')
                            break;

                        case 'Download.Failed':
                            alert('安装失败')
                            break;

                        default:
                            alert('安装已成功，请刷新！');
                            break;
                    }
                    delete window['expressinstallcallback'];
                };

                var swf = './expressInstall.swf';
                // insert flash object
                var html = '<object type="application/' +
                    'x-shockwave-flash" data="' +  swf + '" ';

                if (WebUploader.browser.ie) {
                    html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                }

                html += 'width="100%" height="100%" style="outline:0">'  +
                    '<param name="movie" value="' + swf + '" />' +
                    '<param name="wmode" value="transparent" />' +
                    '<param name="allowscriptaccess" value="always" />' +
                    '</object>';

                container.html(html);

            })($wrap);

            // 压根就没有安转。
        } else {
            $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
        }

        return;
    } else if (!WebUploader.Uploader.support()) {
        alert( 'Web Uploader 不支持您的浏览器！');
        return;
    }

    // 实例化
    uploader = WebUploader.create({
        pick: {
            id: '#uploade_<?php echo $addons_param['name']; ?> .filePicker',
            label: '点击选择图片'
        },
        dnd: '#uploade_<?php echo $addons_param['name']; ?> .dndArea',
        paste: '#uploade_<?php echo $addons_param['name']; ?>',
//        swf: '__ADDONS__/webuploader/Uploader.swf',
        server: '<?php echo addons_url("webuploader://File/uploadpicture"); ?>',
        chunked: false,
        chunkSize: 512 * 1024,
        method:'POST',
        fileVal:'addonwebuploader_file',
        auto:true,//自动上传
        accept: {
            title: 'Images',
            extensions: '<?php echo $addons_config['param']['accept']; ?>',
            mimeTypes: '<?php echo $addons_config['param']['mimeTypes']; ?>'
        },

        // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
        disableGlobalDnd: true,
        fileNumLimit: <?php echo $addons_config['param']['number']; ?>,
        fileSizeLimit: 200 * 1024 * 1024,    // 200 M
        fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
    });
    // 拖拽时不接受 js, txt 文件。
    uploader.on( 'dndAccept', function( items ) {
        var denied = false,
            len = items.length,
            i = 0,
            // 修改js类型
            unAllowed = 'text/plain;application/javascript ';

        for ( ; i < len; i++ ) {
            // 如果在列表里面
            if ( ~unAllowed.indexOf( items[ i ].type ) ) {
                denied = true;
                break;
            }
        }

        return !denied;
    });

    uploader.on('dialogOpen', function() {
        console.log('here');
    });
    uploader.on('ready', function() {
        window.uploader = uploader;
    });

    // 当有文件添加进来时执行，负责view的创建
    function addFile( file ) {
        var $li = $( '<li id="' + file.id + '">' +
                '<p class="title">' + file.name + '</p>' +
                '<p class="imgWrap"></p>'+
                '<p class="progress"><span></span></p>' +
                '</li>' ),

            $btns = $('<div class="file-panel">' +
                '<span class="cancel">删除</span>' +
                '<span class="rotateRight">向右旋转</span>' +
                '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
            $prgress = $li.find('p.progress span'),
            $wrap = $li.find( 'p.imgWrap' ),
            $info = $('<p class="error"></p>'),

            showError = function( code ) {
                switch( code ) {
                    case 'exceed_size':
                        text = '文件大小超出';
                        break;

                    case 'interrupt':
                        text = '上传暂停';
                        break;

                    default:
                        text = '上传失败，请重试';
                        break;
                }

                $info.text( text ).appendTo( $li );
            };

        if ( file.getStatus() === 'invalid' ) {
            showError( file.statusText );
        } else {
            // @todo lazyload
            $wrap.text( '预览中' );
            uploader.makeThumb( file, function( error, src ) {
                var img;

                if ( error ) {
                    $wrap.text( '不能预览' );
                    return;
                }

                if( isSupportBase64 ) {
                    img = $('<img src="'+src+'">');
                    $wrap.empty().append( img );
                } else {
                    $.ajax('../../server/preview.php', {
                        method: 'POST',
                        data: src,
                        dataType:'json'
                    }).done(function( response ) {
                        if (response.result) {
                            img = $('<img src="'+response.result+'">');
                            $wrap.empty().append( img );
                        } else {
                            $wrap.text("预览出错");
                        }
                    });
                }
            }, thumbnailWidth, thumbnailHeight );

            percentages[ file.id ] = [ file.size, 0 ];
            file.rotation = 0;
        }
        //文件状态变化
        file.on('statuschange', function( cur, prev ) {
            if ( prev === 'progress' ) {
                $prgress.hide().width(0);
            } else if ( prev === 'queued' ) {
//                $li.off( 'mouseenter mouseleave' );
//                $btns.remove();
            }
            // 成功
            if ( cur === 'error' || cur === 'invalid' ) {
                showError( file.statusText );
                percentages[ file.id ][ 1 ] = 1;
            } else if ( cur === 'interrupt' ) {
                showError( 'interrupt' );
            } else if ( cur === 'queued' ) {
                $info.remove();
                $prgress.css('display', 'block');
                percentages[ file.id ][ 1 ] = 0;
            } else if ( cur === 'progress' ) {
                $info.remove();
                $prgress.css('display', 'block');
            } else if ( cur === 'complete' ) {
                $prgress.hide().width(0);
                $btns.find('.rotateLeft').remove();
                $btns.find('.rotateRight').remove();
                $li.append( '<span class="success"></span>' );
            }

            $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
        });

        $li.on( 'mouseenter', function() {
            $btns.stop().animate({height: 30});
        });

        $li.on( 'mouseleave', function() {
            $btns.stop().animate({height: 0});
        });

        $btns.on( 'click', 'span', function() {
            var index = $(this).index(),
                deg;
            switch ( index ) {
                case 0:
                    uploader.removeFile( file );
                    return false;

                case 1:
                    file.rotation += 90;
                    break;

                case 2:
                    file.rotation -= 90;
                    break;
            }
            if ( supportTransition ) {
                deg = 'rotate(' + file.rotation + 'deg)';
                $wrap.css({
                    '-webkit-transform': deg,
                    '-mos-transform': deg,
                    '-o-transform': deg,
                    'transform': deg
                });
            } else {
                $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
            }
            return false;
        });

        //当前容器是否添加了文件
        var dqjiedian = $queue.find('li').eq(click_number).prop('outerHTML');
        var dqjiedian_attr = $(dqjiedian).attr('id');
        if(dqjiedian_attr == "" || dqjiedian_attr == undefined || dqjiedian_attr == null){
        }else{
            //判断图片是否上传到服务器
            var success = $('#'+dqjiedian_attr+' .success').index();
            //删除服务器图片
            if(success > 0){
                console.log(success+'88888');
            }
            uploader.removeFile( dqjiedian_attr );
        }
        $queue.find('li').eq(click_number).replaceWith($li);
        //$li.appendTo( $queue );
    }
    // 负责view的销毁
    function removeFile( file ) {
        var $li = $('#'+file.id);
        delete percentages[ file.id ];
        updateTotalProgress();
//        $li.off().find('.file-panel').off().end().remove();

        var dd = $li.off().find('.file-panel').off().end();
        $(dd).find('.title').remove();
        $(dd).find('.file-panel').remove();
        $(dd).find('.imgWrap img').remove();
        $(dd).find('.success').remove();
    }

    function updateTotalProgress() {
        var loaded = 0,
            total = 0,
            spans = $progress.children(),
            percent;

        $.each( percentages, function( k, v ) {
            total += v[ 0 ];
            loaded += v[ 0 ] * v[ 1 ];
        } );

        percent = total ? loaded / total : 0;


        spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
        spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
        updateStatus();
    }

    function updateStatus() {
        var text = '', stats;

        if ( state === 'ready' ) {
            text = '选中' + fileCount + '张图片，共' +
                WebUploader.formatSize( fileSize ) + '。';
        } else if ( state === 'confirm' ) {
            stats = uploader.getStats();
            if ( stats.uploadFailNum ) {
                text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+
                    stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
            }

        } else {
            stats = uploader.getStats();
            text = '共' + fileCount + '张（' +
                WebUploader.formatSize( fileSize )  +
                '），已上传' + stats.successNum + '张';

            if ( stats.uploadFailNum ) {
                text += '，失败' + stats.uploadFailNum + '张';
            }
        }

        $info.html( text );
    }

    function setState( val ) {
        var file, stats;

        if ( val === state ) {
            return;
        }

        $upload.removeClass( 'state-' + state );
        $upload.addClass( 'state-' + val );
        state = val;

        switch ( state ) {
            case 'pedding':
//                $placeHolder.removeClass( 'element-invisible' );
//                $queue.hide();
//                $statusBar.addClass( 'element-invisible' );
                uploader.refresh();
                break;

            case 'ready':
                $placeHolder.addClass( 'element-invisible' );
                $( '#filePicker2' ).removeClass( 'element-invisible');
                $queue.show();
                $statusBar.removeClass('element-invisible');
                uploader.refresh();
                break;

            case 'uploading':
                $( '#filePicker2' ).addClass( 'element-invisible' );
                $progress.show();
                $upload.text( '暂停上传' );
                break;

            case 'paused':
                $progress.show();
                $upload.text( '继续上传' );
                break;

            case 'confirm':
                $progress.hide();
                $( '#filePicker2' ).removeClass( 'element-invisible' );
                $upload.text( '开始上传' );

                stats = uploader.getStats();
                if ( stats.successNum && !stats.uploadFailNum ) {
                    setState( 'finish' );
                    return;
                }
                break;
            case 'finish':
                stats = uploader.getStats();
                if ( stats.successNum ) {
//                    layer.msg('上传成功',{'icon':6});
                } else {
                    // 没有成功的图片，重设
                    state = 'done';
                    location.reload();
                }
                break;
        }

        updateStatus();
    }
    //文件上传到服务端响应
    uploader.on( 'uploadAccept', function( file, response ) {
        if(response.code == 0){
            return false
        }
        //处理数据表单value
        var id = file.file.id;
        var index_number = $queue.off().find('#'+id).index();
        $valuefilelist.off().find('input').eq(index_number).val(response.id);
        updateStatus();
    });
    uploader.onUploadProgress = function( file, percentage ) {
        var $li = $('#'+file.id),
            $percent = $li.find('.progress span');

        $percent.css( 'width', percentage * 100 + '%' );
        percentages[ file.id ][ 1 ] = percentage;
        updateTotalProgress();
    };

    uploader.onFileQueued = function( file ) {
        fileCount++;
        fileSize += file.size;

        if ( fileCount === 1 ) {
            $placeHolder.addClass( 'element-invisible' );
//            $statusBar.show();
        }

        addFile( file );
        setState( 'ready' );
        updateTotalProgress();
    };

    uploader.onFileDequeued = function( file ) {
        fileCount--;
        fileSize -= file.size;

        if ( !fileCount ) {
            setState( 'pedding' );
        }

        removeFile( file );
        updateTotalProgress();

    };

    uploader.on( 'all', function( type ) {
        var stats;
        switch( type ) {
            case 'uploadFinished':
                setState( 'confirm' );
                break;

            case 'startUpload':
                setState( 'uploading' );
                break;

            case 'stopUpload':
                setState( 'paused' );
                break;

        }
    });

    uploader.onError = function( code ) {
        var err = '';
        switch (code) {
            case 'F_EXCEED_SIZE':
                err += '单张图片大小不得超过' +  uploader.options.fileSingleSizeLimit + 'kb！';
                break;
            case 'Q_EXCEED_NUM_LIMIT':
                err += '最多只能上传' +  uploader.options.fileNumLimit + '张！';
                break;
            case 'Q_EXCEED_SIZE_LIMIT':
                err += '上传图片总大小超出100M！';
                break;
            case 'Q_TYPE_DENIED':
                err += '无效图片类型，请上传正确的文件格式！';
                break;
            case 'F_DUPLICATE':
                err += '不能上传重复文件';
                break;F_DUPLICATE
            default:
                err += '上传错误，请刷新重试！';
                break;
        }
        layer.msg('Eroor:'+ err,{'icon':6});
        return false;
    };

    $upload.on('click', function() {
        if ( $(this).hasClass( 'disabled' ) ) {
            return false;
        }

        if ( state === 'ready' ) {
            uploader.upload();
        } else if ( state === 'paused' ) {
            uploader.upload();
        } else if ( state === 'uploading' ) {
            uploader.stop();
        }
    });

    $info.on( 'click', '.retry', function() {
        uploader.retry();
    } );

    $info.on( 'click', '.ignore', function() {
        alert( 'todo' );
    } );

    $upload.addClass( 'state-' + state );
    updateTotalProgress();
});
</script>
<!--<script type="text/javascript" src="__ADDONS__/js/upload.js"></script>-->