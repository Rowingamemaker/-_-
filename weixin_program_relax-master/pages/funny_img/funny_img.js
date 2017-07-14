//index.js
//获取应用实例
var app = getApp();

Page({
    /*-------------------------------------------- 数据 ----------------------------------------------*/
    data: {
        articleList: [],//内容信息
        like: '',//喜欢次数
        unlike: '',//不喜欢次数
        musicchange: true //改变音乐样式
    },
    /*-------------------------------------------- 绑定函数 ----------------------------------------------*/
    onLoad: function () {
        ///连接到服务器后端
        var that = this;
        wx.request({    //获取搞笑图文
            url: app.globalData.api.showApi.path.mix,
            data: {
                // showapi_appid: app.globalData.api.showApi.appId,
                // showapi_sign: app.globalData.api.showApi.sign,
                // page: 1,
                // maxResult: 10
            },
            success: function (data) {
                console.log(data);
                that.setData({
                    articleList: data.data
                });
            },

        });
    },
    /*分享设置*/
    onShareAppMessage: function () {
        return {
            title: '轻松一哈-搞笑图片',
            path: '/pages/funny_img/funny_img'
        }
    },
    //评论事件
    //点击图片跳转
    commentclick: function (e) {
        // console.log(e);
        var img = e.currentTarget.dataset.img;
        var name = e.currentTarget.dataset.name;
        var id = e.currentTarget.dataset.id;
        // console.log(img);
        // console.log(name);
        // console.log(id);


        wx.navigateTo({
            url: '/pages/content/content?name=' + name + '&img=' + img + '&id=' + id,
        })
    },
    //点赞事件
    zanclick: function (e) {
        this.onLoad();
        var that = this;
        wx.request({
            url: 'https://boboxiaochengxu.com/Home/Wxjson/like', //仅为示例，并非真实的接口地址
            data: {
                like: 1,
                zanid: e.currentTarget.dataset.id
            },
            header: {
                'content-type': 'application/json'
            },
            success: function (res) {
                //把从后台传过来的like值setdata给like
                // console.log(res.data[0].likeimg);
                that.setData({
                    like: res.data[0].likeimg,
                });

            },
            fail: function (res) {
                // console.log(e.currentTarget.dataset.id)

            }

        })
    },
    //点不赞事件 嘻嘻
    unzanclick: function (e) {
        this.onLoad();
        var that = this;
        wx.request({
            url: 'https://boboxiaochengxu.com/Home/Wxjson/unlike', //仅为示例，并非真实的接口地址
            data: {
                like: 1,
                unzanid: e.currentTarget.dataset.id
            },
            header: {
                'content-type': 'application/json'
            },
            success: function (res) {
                console.log(res.data)
                that.setData({
                    unlike: res.data[0].unlikeimg,
                });
            },
            fail: function (res) {

            }

        })
    },
    // 更换音乐
    music: function () {
        // 播放背景音乐
        // var that = this;
        // console.log('music');
        // if (this.data.musicchange == 1) {
        //     console.log('1');
        //     this.setData({
        //         musicchange: false
        //     })
        //     wx.navigateTo({
        //         url: '/pages/music/music'
        //     })

        // } else {
        //     wx.pauseBackgroundAudio();

        //     console.log('0');
        //     this.setData({
        //         musicchange: true
        //     })
        // }
    }

});
