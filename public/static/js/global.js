/**
 * Created by 86431 on 2017/8/4.
 */
function showMsg(content,id,time) {
    var id = arguments[1] ? arguments[1] : '';//设置参数a的默认值为1
    var time = arguments[2] ? arguments[2] : '';//设置参数a的默认值为1

    var d = dialog({
        content: content,
        quickClose: true// 点击空白处快速关闭
    });
    if(id!=''){
        d.show(document.getElementById(id));
    }
    else{
        d.show();
    }
    if(time!=''){
        setTimeout(function () {
            d.close().remove();
        }, time);
    }
}