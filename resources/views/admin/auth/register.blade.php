<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/admin_lte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="/admin_lte/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="ddb7e21a-a177-4a5e-aab9-a9f966bd9ded">
        try {
            (function(w, d) {
                ! function(lD, lE, lF, lG) {
                    lD[lF] = lD[lF] || {};
                    lD[lF].executed = [];
                    lD.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    lD.zaraz.q = [];
                    lD.zaraz._f = function(lH) {
                        return async function() {
                            var lI = Array.prototype.slice.call(arguments);
                            lD.zaraz.q.push({
                                m: lH,
                                a: lI
                            })
                        }
                    };
                    for (const lJ of ["track", "set", "debug"]) lD.zaraz[lJ] = lD.zaraz._f(lJ);
                    lD.zaraz.init = () => {
                        var lK = lE.getElementsByTagName(lG)[0],
                            lL = lE.createElement(lG),
                            lM = lE.getElementsByTagName("title")[0];
                        lM && (lD[lF].t = lE.getElementsByTagName("title")[0].text);
                        lD[lF].x = Math.random();
                        lD[lF].w = lD.screen.width;
                        lD[lF].h = lD.screen.height;
                        lD[lF].j = lD.innerHeight;
                        lD[lF].e = lD.innerWidth;
                        lD[lF].l = lD.location.href;
                        lD[lF].r = lE.referrer;
                        lD[lF].k = lD.screen.colorDepth;
                        lD[lF].n = lE.characterSet;
                        lD[lF].o = (new Date).getTimezoneOffset();
                        if (lD.dataLayer)
                            for (const lQ of Object.entries(Object.entries(dataLayer).reduce(((lR, lS) => ({
                                    ...lR[1],
                                    ...lS[1]
                                })), {}))) zaraz.set(lQ[0], lQ[1], {
                                scope: "page"
                            });
                        lD[lF].q = [];
                        for (; lD.zaraz.q.length;) {
                            const lT = lD.zaraz.q.shift();
                            lD[lF].q.push(lT)
                        }
                        lL.defer = !0;
                        for (const lU of [localStorage, sessionStorage]) Object.keys(lU || {}).filter((lW => lW
                            .startsWith("_zaraz_"))).forEach((lV => {
                            try {
                                lD[lF]["z_" + lV.slice(7)] = JSON.parse(lU.getItem(lV))
                            } catch {
                                lD[lF]["z_" + lV.slice(7)] = lU.getItem(lV)
                            }
                        }));
                        lL.referrerPolicy = "origin";
                        lL.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(lD[lF])));
                        lK.parentNode.insertBefore(lL, lK)
                    };
                    ["complete", "interactive"].includes(lE.readyState) ? zaraz.init() : lD.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success my-1">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="m-0 p-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
                <p class="login-box-msg">Register a new membership</p>
                <form action="{{ route('doRegister') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>

        </div>
    </div>


    <script src="/admin_lte/plugins/jquery/jquery.min.js">
        < /scrip>

        <
        script src = "/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js" >
    </>

    <script src="/admin_lte/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
