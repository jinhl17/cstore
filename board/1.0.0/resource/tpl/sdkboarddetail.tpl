<?php
//print_r($aInfo);
?>
<div class="mBoard gSmall">
    <table border="1" summary="">
        <caption>게시글 내용 미리보기</caption>
        <tbody>
        <tr>
            <th scope="row">제목</th>
            <td>
                <?php echo $aInfo['bull_subject']?>
            </td>
        </tr>
        <tr>
            <th scope="row">작성자</th>
            <td><?php echo $aInfo['bull_author_name']?></td>
        </tr>
        <tr id="view_area">
            <th scope="row">원글</th>
            <td id="orig_msg"><?php echo $aInfo['bull_content']?></td>
        </tr>
        </tbody>
    </table>
</div>
<p class="gRight">
    <a class="btnCancel" href="[link=sdkboardlist]"><span>목록</span></a>
</p>

