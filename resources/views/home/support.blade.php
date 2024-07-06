<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .wrapper {
            background: #ececec;
            padding: 0 20px 0 20px;
            transform: translateY(-5%);
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .side-image {
            width: 450px;
            height: 550px;
            background-image: url("/assets/images/log_img.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px 0 0 10px;
            position: relative;
        }

        .row {
            width: 900px;
            height: 550px;
            display: flex;
            border-radius: 10px;
            background: #fff;
            padding: 0px;
            box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
        }

        .text-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .text p {
            color: #fff;
            font-size: 20px;
        }

        .right {
            width: 450px;
            height: 550px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .input-boxx {
            width: 330px;
            box-sizing: border-box;
        }

        .side-image img {
            width: 35px;
            position: absolute;
            top: 30px;
            left: 30px;
        }

        .input-boxx header {
            font-weight: 700;
            text-align: center;
            margin-bottom: 45px;
        }

        .input-fieldd {
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 0 10px 0 10px;
        }

        .inputt {
            height: 45px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            outline: none;
            margin-bottom: 20px;
            color: #40414a;
        }

        .input-boxx .input-fieldd label {
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: .5s;
        }

        .input-fieldd input:focus~label {
            top: -10px;
            font-size: 13px;
        }

        .input-fieldd input:valid~label {
            top: -10px;
            font-size: 13px;
            color: #5d5076;
        }

        .input-fieldd .input:focus,
        .input-field .input:valid {
            border-bottom: 1px solid #743ae1;
        }

        .submitt {
            border: none;
            outline: none;
            height: 45px;
            background: #ececec;
            border-radius: 5px;
            transition: .4s;
        }

        .submitt:hover {
            background: rgba(37, 95, 156, 0.937);
            color: #fff;
        }

        .signin {
            text-align: center;
            font-size: small;
            margin-top: 25px;
        }

        .signin span a {
            text-decoration: none;
            font-weight: 700;
            color: #000;
            transition: .5s;
        }

        .signin span a:hover {
            text-decoration: underline;
            color: #000;
        }

        @media only screen and (max-width: 768px) {
            .side-image {
                border-radius: 10px 10px 0 0;
            }

            img {
                width: 35px;
                position: absolute;
                top: 20px;
                left: 47%;
            }

            .textt {
                position: absolute;
                top: 70%;
                text-align: center;
            }

            .textt p {
                font-size: 16px;
            }

            .row {
                max-width: 420px;
                width: 100%;
            }
        }

        .ccontainer {
            transform: translateY(-5%);
            width: 80%;
            margin: 20px auto;
            background-color: hsl(353, 100%, 78%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 80px;
            height: 80px;
            background-color: hsl(0, 0%, 33%);
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 24px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .status-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .status-card {
            display: flex;
            align-items: center;
            background-color: hsl(0, 0%, 33%);
            padding: 10px 20px;
            border-radius: 10px;
            width: 23%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .status-icon {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .delivered {
            background-color: #e0ffe0;
        }

        .shipped {
            background-color: #e0e0ff;
        }

        .processing {
            background-color: #fff0e0;
        }

        .new-orders {
            background-color: #ffe0e0;
        }

        .status-info p {
            margin: 0;
            font-size: 14px;
        }

        .status-info h3 {
            margin: 0;
            font-size: 22px;
        }

        .orders-section h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid hsl(0, 0%, 33%);
        }

        th {
            background-color: hsl(0, 0%, 33%);
        }

        .status-placed {
            color: #fff;
            background-color: hsl(0, 0%, 33%);
            padding: 5px 10px;
            border-radius: 5px;
        }

        .view-icon {
            width: 20px;
            height: 20px;
            background-color: #ccc;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->
    <div style="margin-bottom: 80px;">
        <div class="titre" style="padding: 2rem;">
            <h3 style="text-align: center; font-size:3vw;">NEED SOME HELP?</h3>
            <p style="text-align: center;font-size:1.10rem;" class="p">
                If you need help or would like to get in touch with us, we are at your disposal.
                At FloraQueen your satisfaction is our priority.
            </p>
        </div>
        <div class="container">
            <div class="text">
                <p style="font-size:1.25rem; font-weight: lighter; margin-top: 3rem; margin-bottom: 3rem;"> Please send us your question and we'll answer you as soon as possible.
                    You just need to fill in the following form and click “Send”.
                </p>
            </div>
            <div class="buttons">
                <a href="{{url('myorders')}}">
                    <button class="button">
                    <i class="fa-solid fa-truck fa-2x"></i>
                    Where is my order</button>
                </a>
                <button class="button" id="showQuestions">
                    <i class="fa-sharp fa-solid fa-bag-shopping fa-2x"></i>
                    Ordering Questions</button>
            </div>
            <div style="margin-top: 20px; font-size: 1.25rem; display: none;" id="questionsForm">
                <h3 style="margin-bottom: 10px;">Ordering Questions</h3>
                <button class="button" id="productbtn">I have a question about a product</button>
                <div style="margin-bottom: 50px; display: none;" id="productForm">
                    <form action="{{url('ticket')}}" method="post">
                        @csrf
                        <div class="input-fieldd">
                            <input type="text" class="inputt" name="sender" style="width: 100px;" placeholder="name" required>
                        </div>
                        <div class="input-fieldd">
                            <input type="email" class="inputt" style="width: 200px;" name="email" required placeholder="email">
                        </div>
                        <div class="input-fieldd">
                            <input type="text" class="inputt" name="phone" style="width: 200px;" required placeholder="phone">
                        </div>
                        <div class="input-fieldd">
                            <textarea class="inputt" name="description" required style="height: 100px;" placeholder="description"></textarea>
                        </div>
                        <div class="input-fieldd">
                            <input type="submit" class="submitt" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- info section -->

    @include('home.footer')

</body>
<script>
    document.getElementById('showQuestions').addEventListener('click', function() {
        var form = document.getElementById('questionsForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });
    document.getElementById('productbtn').addEventListener('click', function() {
        var form = document.getElementById('productForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });
</script>

</html>