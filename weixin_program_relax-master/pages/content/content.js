// pages/content/content.js
var app = getApp();
Page({

    /**
     * 页面的初始数据
     */
    data: {
        img: "",
        name: "",
        msg: "",
        uid: "",
        replies: [],
        sendText: '',   //发送的语句
        c: '',   //发送语句的input值
        isSendMsgBtnDisabled: true, //发送按钮禁止
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function (options) {
        // console.log(options);
        // console.log(options.img);
        // console.log(options.name);
        // console.log(options.id);

        var that = this;

        this.setData({
            img: options.img,
            name: options.name,
            uid: options.id
        });
        wx.request({
            url: 'https://boboxiaochengxu.com/Home/Wxjson/returncontent',
            data: {
                uid: options.id
            },
            header: {
                'content-type': 'application/json'
            },
            success: function (res) {
                that.setData({
                    replies: res.data,
                });
            },
            fail: function () {
                console.log('fail');
            }

        })
    },
    /**
     * 发送评论
     */
    sendMsg: function () {
        var that = this;
        if (that.data.msg) {
            wx.request({
                url: 'https://boboxiaochengxu.com/Home/Wxjson/charucontents',
                data: {
                    contentuid: that.data.msg,//用户内容
                    imguid: app.globalData.userInfo.avatarUrl,///用户头像
                    timeuid: new Date().toLocaleString(),//用户评论
                    uid: that.data.uid, //contents表里的外键
                    nameuid: app.globalData.userInfo.nickName,///用户头像
                },
                header: {
                    'content-type': 'application/json'
                },
                success: function (res) {
                    console.log(res.data);
                    // console.log(res.data.contentuid);
                    // console.log(res.data.imguid);
                    // console.log(res.data.timeuid);
                    // console.log(res.data.uid);
                    // console.log(res.data.nameuid);
                    that.setData({
                        replies: res.data,
                        inputMsg: '',   //清空对话框
                        isSendMsgBtnDisabled: true //发送按钮禁止
                    });
                }
            })
        } else {
            console.log("请输入评论");
        }
    },
    /**
     * 保存信息到data里面
     */
    msg: function (e) {
        console.log(e.detail.value);
        this.setData({
            msg: e.detail.value,
            isSendMsgBtnDisabled: false

        })
    },
    /**
     * 页面相关事件处理函数--监听用户下拉动作
     */
    onPullDownRefresh: function () {

    },

    /**
     * 页面上拉触底事件的处理函数
     */
    onReachBottom: function () {

    },

    /**
     * 用户点击右上角分享
     */
    onShareAppMessage: function () {

    }
})