<style>
    form{
        margin: 5% 0 12% 20%;
    }
</style>
<body>
    <form action="index.php?act=goiemail" method="post">
    <p>TO: <input style="width: 500px" name="email" type="email" placeholder="Email cần gửi" required></p>
    <p>SUBJECT: <input style="width: 455px" name="subject" type="text" placeholder="Vui lòng viết không dấu" required></p>
    <p>CONTENT:</p>
    <textarea name="content" id="" cols="70" rows="10" required></textarea> <br><button>CLICK to send mail</button>
    </form>
</body>
</html>