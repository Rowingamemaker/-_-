//index.js
//获取应用实例
var app = getApp();

Page({
    /*-------------------------------------------- 数据 ----------------------------------------------*/
    data: {
        articleList: []
    },
    /*-------------------------------------------- 绑定函数 ----------------------------------------------*/
    onLoad: function () {
        var that = this;
        wx.request({    //获取搞笑gif
            url: app.globalData.api.showApi.path.gif,
            data: {
                showapi_appid: app.globalData.api.showApi.appId,
                showapi_sign: app.globalData.api.showApi.sign,
                page: 1,
                maxResult: 10
            },
            success: function (data) {
                // console.log(data);
                that.setData({
                    articleList: data.data.showapi_res_body.contentlist
                });
            }
        });
    },
    /*分享设置*/
    onShareAppMessage: function () {
        return {
            title: '轻松一哈-搞笑动态图',
            path: '/pages/funny_gif/funny_gif'
        }
    }
});
