<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../App.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./diaryLayoutstyle.css?v=<?php echo time(); ?>">
    <title>Trang chủ - DiaryBook</title>
</head>


<!-- ./diaryLayout.css?v=<?php echo time(); ?> -->

<body>
    <header>
        <a href="../homeLayout/HomeLayout.html">
            <h1>Diary Book Electric</h1>
        </a>
        <p class="name_user">
            <img src="https://kynguyenlamdep.com/wp-content/uploads/2022/06/avatar-cute-vui-nhon.jpg" class="avt" alt="">
            <?php
            session_start();
            echo $_SESSION["user_name"];
            ?>
        </p>
    </header>

    <ul>
        <a href="../newNote/newNote.html"><button class="create-new-button"><i class="fa-solid fa-square-plus"></i>Tạo
                mới</button></a>
        <mark style="color: red;">Chào <?php
            echo $_SESSION["user_name"];
            ?>, khởi động ngày mới bằng một chút ghi chú chứ nhỉ :))</mark>

        <li>
            <button class="snip1547 hover"><span>29/05/2003</span></button>
            <h2>Section 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tristique dolor eu quam tempus
                convallis. Aenean semper lacinia sapien, ut venenatis justo pharetra at. Sed ullamcorper dapibus
                nulla, et scelerisque leo ultricies ac. Nunc imperdiet, ipsum id viverra euismod, ex orci eleifend
                nisi, ac pretium nibh nibh in felis. Nunc faculisis hendrerit diam eu elementum.</p>
        </li>


        <li>
            <button class="snip1547 hover"><span>29/05/2003</span></button>
            <h2>Section 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tristique dolor eu quam tempus
                convallis. Aenean semper lacinia sapien, ut venenatis justo pharetra at. Sed ullamcorper dapibus
                nulla, et scelerisque leo ultricies ac. Nunc imperdiet, ipsum id viverra euismod, ex orci eleifend
                nisi, ac pretium nibh nibh in felis. Nunc facilisis hendrerit diam eu elementum.</p>
        </li>


        <li>
            <button class="snip1547 hover"><span>29/05/2003</span></button>
            <h2>Section 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tristique dolor eu quam tempus
                convallis. Aenean semper lacinia sapien, ut venenatis justo pharetra at. Sed ullamcorper dapibus
                nulla, et scelerisque leo ultricies ac. Nunc imperdiet, ipsum id viverra euismod, ex orci eleifend
                nisi, ac pretium nibh nibh in felis. Nunc facilisis hendrerit diam eu elementum.</p>
        </li>

    </ul>
    <footer>
        <p>Copyright © 2023</p>
    </footer>
</body>

</html>