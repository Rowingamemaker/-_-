//app.js
App({
    /*启动函数
     * */
    onLaunch: function () {
        var logs = wx.getStorageSync('logs') || [];     //调用API从本地缓存中获取数据
        logs.unshift(Date.now());
        wx.setStorageSync('logs', logs);    //存入缓存
    },
    /*获取用户信息
     *   @param cb获取成功时的回调
     * */
    getUserInfo: function (cb) {
        var that = this;
        console.cb;
        if (this.globalData.userInfo) {
            console.log(this.globalData.userInfo);
            console.log('aaaaaaa');

            typeof cb == "function" && cb(this.globalData.userInfo);
        } else {
            wx.login({      //调用登录接口
                success: function () {
                    wx.getUserInfo({
                        success: function (res) {
                            console.log('aaaaaaa');

                            console.log(res.userInfo);
                            that.globalData.userInfo = res.userInfo;
                            typeof cb == "function" && cb(that.globalData.userInfo);
                        }
                    })
                },
                fail:function(e){
                    console.log('aaaaaaa');
                    // console(e);
                }
            })
        }
    },
    /*全局变量
     * */
    globalData: {
        userInfo: null,
        api: {
            showApi: { 
                appId: 28034,
                sign: '55f74716416141b1ac2d81797a321538',
                path: {
                    mix: 'https://boboxiaochengxu.com/Home/Wxjson/index.html',  
                    gif: 'https://route.showapi.com/341-3',    
                    bot: 'https://route.showapi.com/60-27'  //机器人借口
                }
            }
        }
    }
});