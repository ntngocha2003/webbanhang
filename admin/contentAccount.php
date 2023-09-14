<table class="table table-borderless">
                                        <thead class="table-borderless-thead">
                                            <tr>
                                                <th class="table-borderless-th" >Check</th>
                                                <th class="table-borderless-th" >Email</th>
                                                <th class="table-borderless-th" >Tên đăng nhập</th>
                                                <th class="table-borderless-th" >Mật khẩu</th>
                                                <th class="table-borderless-th" >Quyền</th>
                                                <th class="table-borderless-th" >Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    
                                            <?php
                                                require_once 'connect.php';
                        
                                                $render_sql= "SELECT * FROM `account` ";
                                                $result=mysqli_query($conn,$render_sql);
                                                while($r=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <tr class="table-borderless-tr">
                                                        <td class="table-borderless-td">
                                                            <input type="checkbox" name="checkbox">
                                                        </td>
                                                        <td class="table-borderless-td">
                                                            <?php echo $r['email'];?>
                                                        </td>
                                                        <td class="table-borderless-td">
                                                            <?php echo $r['ten_dn'];?>
                                                        </td>
                                                        <td class="table-borderless-td">
                                                            <?php echo $r['mat_khau'];?>
                                                        </td>
                                                        <td class="table-borderless-td">
                                                            <?php echo $r['quen'];?>
                                                        </td>
                                                        <td class="table-borderless-td" style="display:flex;justify-content: space-around;">
                                                            <a href="editAccount.php?sid=<?php echo $r['id'];?>" class="btn-info">Sửa</a>
                                                            <a onclick="return confirm('bạn có muốn xóa tài khoản này không')"
                                                                href="removeAccount.php?sid=<?php echo $r['id'];?>" class="btn-danger">Xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php    
                                                }
                                            ?>
                    
                                        </tbody>
</table> 