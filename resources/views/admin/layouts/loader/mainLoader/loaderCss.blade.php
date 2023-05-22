<style>
    .spinner {
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        background: #aceaffd7;
        width: 100%;
        min-height: 100vh;
        height: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
    }
    .spinner .cloud {
        width: 200px;
        height: 70px;
        background: #F2F9FE;
        background: -webkit-gradient(linear, left top, left bottom, from(#F2F9FE), to(#D6F0FD));
        background: linear-gradient(#F2F9FE, #D6F0FD);
        border-radius: 1000px;
        position: relative;
        -webkit-animation: cloudSpinner 1s infinite;
        animation: cloudSpinner 1s infinite;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        -webkit-box-shadow: 0px 20px 20px 0px #00000020;
        box-shadow: 0px 20px 20px 0px #00000020;
    }
    .spinner .cloud:before, .spinner .cloud::after {
        content: "";
        position: absolute;
        background: #F2F9FE;
        z-index: -1;
    }
    .spinner .cloud:after {
        width: 50px;
        height: 50px;
        top: -20px;
        left: 35px;
        border-radius: 100px;
    }
    .spinner .cloud:before {
        width: 100px;
        height: 100px;
        top: -40px;
        right: 25px;
        border-radius: 200px;
    }
    @-webkit-keyframes cloudSpinner {
        0% {
            top: 0px;
        }
        50% {
            top: 10px;
        }
        100% {
            top: 0px;
        }
    }
    @keyframes cloudSpinner {
        0% {
            top: 0px;
        }
        50% {
            top: 10px;
        }
        100% {
            top: 0px;
        }
    }
</style>
