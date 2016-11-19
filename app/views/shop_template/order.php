<html lang="en" style="font-size: 18.56px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate,max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="full-screen" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>确认订单</title>
    <script type="text/javascript">
        document.documentElement.style.fontSize = Math.min(screen.width, document.documentElement.getBoundingClientRect().width) / 750 * 32 + 'px'
    </script>

    <link rel="stylesheet" href="//p2.jmstatic.com/static/static_cart_mobile/css/confirm/confirm_91e237f5.css">
    <style type="text/css">
        .down-banner {
            height: 3.75rem;
            padding: 0 1.625rem 0 .625rem;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border-bottom: 1px solid #eee;
            background: #fff;
            position: relative
        }

        .down-banner .logo {
            width: 2.5rem;
            height: 2.5rem;
            display: block
        }

        .down-banner div {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-left: .625rem;
            font-size: .8125rem;
            line-height: 1.5
        }

        .down-banner a, .down-banner div p:first-child {
            font-size: .875rem
        }

        .down-banner a {
            width: 5rem;
            line-height: 2.25rem;
            text-align: center;
            color: #fff;
            border-radius: 1.125rem;
            background: #fe4070;
            display: block
        }

        .down-banner .close {
            width: .5625rem;
            height: .5625rem;
            position: absolute;
            top: .5625rem;
            right: .5rem;
            display: block
        }
    </style>
    <style type="text/css">
        .alert {
            position: fixed;
            bottom: 10.986rem;
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            z-index: 999
        }

        .alert div {
            max-width: 18.4375rem;
            padding: .75rem 1.25rem;
            color: #fff;
            background: rgba(0, 0, 0, .5);
            border-radius: .3125rem
        }
    </style>
    <style type="text/css">
        .loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, .6);
            z-index: 999
        }

        .loading img {
            width: 7.0625rem;
            height: 6.875rem;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -3.4375rem 0 0 -3.53125rem
        }
    </style>
    <style type="text/css">
        .header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 2.5625rem;
            background: #fff;
            border-bottom: 1px solid #eee;
            font-size: 1rem;
            color: #333;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 .85rem
        }

        .head-back {
            width: .46875rem;
            height: .84375rem;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAbCAYAAACjkdXHAAAAAXNSR0IArs4c6QAAAlJJREFUOBGVk0trE1EUgJ3JpEkMSrKoSilSig+Ke3FRKCkJVCWCSgMSTIwhycJFXfkLBOlGBFd5QxAFERdNBQu1QwVREEEEEfIXRBQVjckk8TtjJ0yTEicX7pz7ON953lH2jTkqlcqkYRh3er3eY20ctlarHWo2m1uAp+A0xSlcrVaPtNttAecURfno9XoXHXkul8tTrVZrC0cnAT9omhZOJBKf/+u5WCxOd7tdAY8Dvvd4POFkMvlFIh4J5/P5o+jozFnAd36/PxKPx78KKEP9J4a/5DjD6TZTwLdutztsB4XYE6Yds+Qo4AzgG4oUSaVS3wSwj6GwS6XSMXLUAaYBX7lcrrPpdPqHHbLWu+BCoXCCCwGnkC+DweD5WCz201IelP2wqeoc0PYOqPt8vnOjQDFkesajvJgXgIcJdTMQCFwA/D3oaXCv2kIVcIOqRp2AYkjCXsTjpGyQt6lqU9ZOhgpQRvHpjvI61T7tBBQdM2dd17VGo/GQ/TLzO293ifa8FoVRw6x2KBQyaMsVcn6E8sFOp7PB05wfBcpdv1UUqUOVr3L2gFQOYOg5xVwYZWDXIxFFQJWel5HX2P5SVTWayWTkrxoafc/WDR67KF9HSiH381TXMRax7u1yCJZLwB4GMsg8Wx9RrNGFJTto6g0e2PdACnnf5+wG8w/zci6Xe2bpDOVsXdglBu5haIVIWpwvZ7PZNbnfM2w7KGuUbwLexcAE8wnGLsq5I8+iKANoFfgWS4P//JLLPHX4qdfrm9FodAL1BYy0xvJs+aB1Z2jhp796xPNOoWBnswAAAABJRU5ErkJggg==) no-repeat;
            background-size: 100% 100%
        }

        .head-home {
            width: 1.125rem;
            height: 1.15625rem;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABFNJREFUWAntmFloU0EUhr1ZarWiFVRU7FsFEX3yRRGXNLjFDUGjqDR0f7CoLyK4ofimD4KK0h0iRY1oxaWuWBV9UxDccTet1Sq0IiXapKnfifeWmty2ub1J9SEDJzN3Zs45//3PTO6ZUYYkoJSXl6/CTGlXV9cMMacoykOqo8XFxXXybKYoZpRramrSOzo6vNhYo9oJqbVNaoD67Ha7Jy8v76fab7iyGNZQFcrKyoYHg8GrPAq4bxaLZd1otUhb+mDUzZwrMldVM1wNiEGfzzesra3tEgBy8PgYlpbm5+f7e3qvrq7OAtxl+qbD5K3MzMxlbrc70HNOPG3DAOvr64f6/f4LGF+I46c2m80BuK96zgA5FpC3GJvG3Ju8yHKj4TYEEObSYK4O5lw4fUEo5xcVFX3RA6f1eb3ecYFAoIHnqcj1tLS0lUZAxr0GWUd2wJ1Rwb3CWU5/4ARkbm5uCy8iS+EFspBNVSdRkLF4SlwAGxoaZFeeAtwK6jfp6emOkpKS5ngcyBx5EZhz0HyJLG5sbDwn0ZCx/kq/IcaQtbW1tRZDa5H3yDzAfaQ2XKqqqiaGQqHbKE5mTV7ghVdjK9iXoT4ZxIACuCoMCDi/hGqg4AREQUHBJ2Gf5ls1GrVCgIz1VvoEWFFRcRxFD/KZEDkJ1bveDMXb7/F4mqxWaw7zJQprWNfVQkRv+r0CZFMcQrEExW/8PTjZebIxElIKCws/ANKJsWZ85KpE6NrWBci3dT+ztyKtrJUF/M8909U20QnI1ywZJ/a/ChEQckDPXAxAwG1HYReKP1BYwgf/kZ5iIvpYMs8BuQhb35FtgNwZbfev2DOhlAlHkAAABdydaIVkPFdWVs7u7Oy8jm35Zm9hIx7W/HQDhLl8OiuRIG+1khBIIjBoBXLk03kRh3bqAtitEecRgAyup30CCTPoTkQeJ8aNFskrWV4+9ODIsh6QpxXodYbD4WsMKHRupPOkUcOJnA/IDWDxYjMMngUWYn+QDivMbfrX4ORFiV4twDbTtEHcQdnFU5AQ4Mqp/4vC+j8GkF/IFAVK78HgbFCXktvVZmRkRNL29vb2kJG0yMybydEBv5FjAn5tZDwbsXeEqN63AW43jRvQeZQBEc3XGRpu7SGZNT69iHau0VzJht1n4T9HksnFPEiW/ARp0mYMVo1v7e9OfAuGi3S5WHY3IrSyMG/SKTKE7+Ic2Lwr7cEqRLFL9bUOwu719Cub5L8uKYBmw5NiMMWgWQbM6qfWYIpBswyY1ddbg3LCkjLqT5X8XxKDTNWL5rvbaQzA7OzsZyj8ZMZMzipjumcmqUEuOJ5cYRbmA1zQxpy/YwA6HI4QCnIfMxLxAXJCkrBJ5jSJC86z2B+BHOMGtjPaVyTdiu4ku91BZjuXfgdsNpF1t/RIiaKnD+gZuwo2xyGSCz5A9ugZ0hLFmDFunYZxsyVXIEsRObcko8il5vmsrKy9LpdLziAx5TcV4b/kFIcMHQAAAABJRU5ErkJggg==) no-repeat;
            background-size: 100% 100%
        }</style>
</head>
<body>

<div class="page">
    <div class="content">
        <div class="header">
            <div class="head-back"></div>
            <div class="head-title">确认订单</div>
            <div class="head-home"></div>
        </div>
        <div class="address-box">
            <span class="location-icon"></span>
            <div class="addr-text">
                <div class="per-info"> 收货人：
                    <span>*人</span>
                    <span class="per-tel">183****4184</span>
                </div>
                <div class="address-detail">北京市-市辖区-东城区 测试123</div>
            </div>
            <span class="right-arrow"></span>
        </div>
        <div class="time-select-box">
            <span class="calendar-icon"></span>
            <span class="time-text">仅周末送货</span>
            <span class="right-arrow"></span></div>
        <div class="order-groups">
            <div class="order-group">
                <div class="group-head">
                    <span class="store-icon"></span> <span class="store-info">聚美优品发货</span></div>
                <div class="product-items">
                    <div class="product-item"><img class="item-img"
                                                   src="http://p2.jmstatic.com/product/001/420/1420087_std/1420087_200_200.jpg">
                        <div class="item-info">
                            <div class="item-info-1"><span class="item-title"><span class="red">[极速免税]</span> Fancl保湿型洁面粉50g</span>
                                <span class="item-price">¥95</span></div>
                            <div class="item-info-2"><span>50g</span> <span>x1</span></div>
                        </div>
                    </div>
                </div>
                <div class="group-stat">
                    <div class="stat-nav">
                        <div>运费</div>
                        <div class="freight-info">
                            <div class="fre-info-1">快递：¥5</div>
                            <div class="fre-info-2">新用户满39元优惠，减免¥5</div>
                        </div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center"><span>现金券</span> <span class="no-select-tag">暂无可用</span></div>
                        <div><span>使用现金券<span class="right-arrow-icon"></span></span></div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center"><span>红包</span> <span class="no-select-tag">暂无可用</span></div>
                        <div><span>使用红包<span class="right-arrow-icon"></span></span></div>
                    </div>
                    <div class="stat-nav">
                        <div class="nav-center">合计</div>
                        <div class="notice-num">¥95</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="invoice-box">
            <div class="invo-head">发票</div>
            <div class="invo-nav">
                <div class="nav-center">索要发票 <span class="detail-text">您购买的商品暂不支持开具发票</span> <span
                        class="ques-icon"></span></div>
                <div class="select-icon unchecked"></div>
            </div>
        </div>
    </div>
    <div class="submit-box">
        <div class="order-stat">
            <div class="stat-count">共 1 件商品</div>
            <div class="stat-sum">合计 <span>¥95</span></div>
        </div>
        <button type="button">提交订单</button>
    </div>
</div>
</body>
</html>