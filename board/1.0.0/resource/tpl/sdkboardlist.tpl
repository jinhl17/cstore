<div class="mBoard">
    <table border="1" summary="" class="eChkColor">
        <colgroup>
            <col class="chk">
            <col style="width:100px;">
            <col style="width:auto;">
            <col style="width:100px;">
            <col style="width:120px;">
            <col style="width:50px;">
        </colgroup>
        <thead>
        <tr>
            <th scope="col"><input type="checkbox" class="allChk"></th>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
            <th scope="col">조회</th>
        </tr>
        </thead>
        <tbody class="center">
        <?php foreach ($aList as $aVal) {?>
        <tr class="">
            <td>
                <input class="cat_key rowChk" value="cate_53" type="checkbox">
            </td>
            <td><?php echo $aVal['skin_no']?></td>
            <td class="left"><a href="[link=sdkboarddetail?id=<?php echo $aVal['bull_no']?>]"><?php echo $aVal['bull_subject']?></a></td>
            <td class="left"><?php echo $aVal['bull_author_name']?></td>
            <td class="left"><?php echo $aVal['bull_write_date']?></td>
            <td class="left"><?php echo $aVal['bull_hit']?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
