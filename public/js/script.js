$(function() {
    $('.background-container').bgSwitcher({
        // 切り替える背景画像を指定
        images: ['../images/backgroundImage1.jpg', '../images/backgroundImage2.jpg', '../images/backgroundImage3.jpg', '../images/backgroundImage4.jpg'],
    })

    //headerの制御
    var startPos = 0,winScrollTop = 0;  //「startPos」 ＝ 直前までのスクロールの値,「winScrollTop」 ＝ 現在のスクロール値
    $(window).on('scroll', function() {
        winScrollTop = $(this).scrollTop(); //ここで現在のスクロール値を代入している
        if (winScrollTop >= startPos) { //もし直前のスクロール値よりも大きければ（下にスクロールしていれば）
            if (winScrollTop >= 200) {
                $('header').addClass('hide');   //hideのクラスを付与   
            }
        } else {
            $('header').removeClass('hide');
        }
        startPos = winScrollTop; //次の判定のため現在の値をニュートラル値として扱う
    });

    //画像アップロードボタンの制御
    $("input[type='file']").on('change',function(){
        var file = $(this).prop('files')[0];
        if(!($(".filename").length)){
            $("#input-group").append('<span class="filename"></span>');
        }
        $("#input-label").addClass('changed');
        $(".filename").html(file.name);
    });

    /*
    //for contact-modal
    $('.contact-link-btn').click(function () { 
        $('#contact-modal').addClass('active-modal');
        $('#contact-modal').fadeIn();

        //for contact-confirm-modal
        $('#close-open-modal').click(function () {
            $('#contact-modal').removeClass('active-modal');
            $('#contact-modal').fadeOut();
            console.log('クリックされました。');
            console.log('textareaに入力された値の取得を始めます。');
            //for textarea of contact-confirm-modal
            //相談内容の値を取得
            const textarea = document.textarea.body.value;
            document.getElementById('input-message').textContent = textarea;

            $('#contact-confirm-modal').addClass('active-modal');
            $('#contact-confirm-modal').fadeIn();

            
            
        });
    });
    */
   
    $('.close-modal').click(function () { 
        //1段階目
        $('#contact-modal').removeClass('active-modal');
        $('#contact-modal').fadeOut();
        //2段階目
        $('#contact-confirm-modal').removeClass('active-modal');
        $('#contact-confirm-modal').fadeOut();
    });
    //モーダル内のボタンかモーダル外をクリックするとフェードアウトするコード
    //1段階目
    $(document).click(function (e) {
        if (!$(e.target).closest('.contact-form').length && !$(e.target).closest('.contact-btn').length) {
            $('#contact-modal').fadeOut();
        }
    });
    //2段回目
    $(document).click(function(e) {
        if(!$(e.target).closest('.contact-confirm-form').length && !$(e.target).closest('.contact-submit').length) {
            $('#contact-confirm-modal').fadeOut();
        }
    });

    //for close-modal
    $('.delete-btn').click(function () { 
        $('#delete-modal').addClass('active-modal');
        $('#delete-modal').fadeIn();
    });
    $('#delete-modal').click(function () { 
        $('#delete-modal').removeClass('active-modal');
        $('#delete-modal').fadeOut();
    });
    $(document).click(function(e) {
        if(!$(e.target).closest('.delete-form'.length) && !$(e.target).closest('.contact-btn').length) {
            $('#delete-modal').fadeOut();
        }
    })

    //for buy-coin-modal
    $('.buy-coin-btn').click(function () { 
        $('#buy-coin-modal').addClass('active-modal');
        $('#buy-coin-modal').fadeIn();
    });
    $('#close-modal').click(function () { 
        $('#buy-coin-modal').removeClass('active-modal');
        $('#buy-coin-modal').fadeOut();
    });
    $(document).click(function(e) {
        if (!$(e.target).closest('.buy-coin-form').length && !$(e.target).closest('.btn-container').length) {
            $('#buy-coin-modal').fadeOut();
        }
    });
    
    $('#close-open-modal').click(function () {
        //coin_judgmentはdm.indexのscriptタグに記述されている
        if (coin_judgment == true) {
            console.log('Coin Check:Ok!');
            //入力内容の値を取得
            const textarea = document.textarea.body.value;
            if (textarea == "") {
                alert('相談内容を正しく入力してください。')
            } else {
                document.getElementById('input-message').textContent = textarea;

                //formのinputに代入
                document.getElementById("message-target").value = textarea;

                $('#contact-confirm-modal').addClass('active-modal');
                $('#contact-confirm-modal').fadeIn();
            }
        } else {
            console.log('Coin Check:No!');
            $('#warning-modal').addClass('active-modal');
            $('#warning-modal').fadeIn();

            $(document).click(function(e) {
                if (!$(e.target).closest('.warning-message').length && !$(e.target).closest('.contact-submit').length) {
                    $('#warning-modal').fadeOut();
                }
            });
        }
        
        
    });
    $('.page-back').click(function () {
        window.history.back();
    });


})

