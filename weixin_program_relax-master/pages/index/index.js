var interval = ''
var app = getApp()
Page({

    /**
     * 页面的初始数据
     */
    data: {
        yidong: 0,
        motto: 'Hello',
        userInfo: {}

    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function (options) {
        var that = this;
        var time = 0;
        interval = setInterval(function () {
            time = time - 1
            if (time >= -360) {
                that.setData({
                    yidong: time
                })
            } else {
                clearInterval(interval);
            }
            console.log(time);
        }, 40)
        var that = this
        //调用应用实例的方法获取全局数据
        app.getUserInfo(function (userInfo) {
            //更新数据
            that.setData({
                userInfo: userInfo
            })
        })
    },
    bindViewTap: function () {
        console.log('aaa');
        clearInterval(interval);

        wx.switchTab({
            url: '/pages/funny_img/funny_img'
        })
    },

})