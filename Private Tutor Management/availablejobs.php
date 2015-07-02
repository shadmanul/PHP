<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("Available Jobs", $_SESSION["name"], "", "active", "",$_SESSION["status"]);
    ?>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">All the available jobs</div>
        <div class="panel-body">
            <div>All the available jobs are listed below.</div><br/>
            <div style="color: dodgerblue;">Search by location or job title.</div>
            <div><form class="form-search" method="post" action="availablejobs.php">
                    <input type="text" name="stext" class="input-medium search-query">
                    <button type="submit" name="search" class="btn">Search</button>
                </form></div>
        </div>

        <!-- List group -->
        <ul class="list-group">

            <?php
            if(isset($_POST["search"])){
                $search=mysql_query("select * from jobs where jobtitle like '%$_POST[stext]%'
                            or address like '%$_POST[stext]%'");
                if ($search === FALSE) {
                    die(mysql_error());
                } else {
                    while ($row = mysql_fetch_assoc($search)) {
                        echo "<li class='list-group-item'><table>
                            <tr>
                                <td><h3>" . $row['jobtitle'] . "</h3></td>
                            </tr>
                            <tr>
                                <td><div>Posted by: <a href='profile.php?username=" . $row['username'] . "'>"
                            . $row['username'] . "</a></div></td>
                            </tr>
                            <tr>
                                <td><div>" . $row['requirements'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Working Days: " . $row['workingdays'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Salary: " . $row['salary'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Contact no: " . $row['contact'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Address: " . $row['address'] . "</div></td>
                            </tr>
                        </table></li>";
                    }
                }
            }
            else {
                $q = mysql_query("select * from jobs order by job_id desc");
                if ($q === FALSE) {
                    die(mysql_error());
                } else {
                    while ($row = mysql_fetch_assoc($q)) {
                        echo "<li class='list-group-item'><table>
                            <tr>
                                <td><h3>" . $row['jobtitle'] . "</h3></td>
                            </tr>
                            <tr>
                                <td><div>Posted by: <a href='profile.php?username=" . $row['username'] . "'>"
                            . $row['username'] . "</a></div></td>
                            </tr>
                            <tr>
                                <td><div>" . $row['requirements'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Working Days: " . $row['workingdays'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Salary: " . $row['salary'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Contact no: " . $row['contact'] . "</div></td>
                            </tr>
                            <tr>
                                <td><div>Address: " . $row['address'] . "</div></td>
                            </tr>
                        </table></li>";
                    }
                }
            }
            ?>
        </ul>
    </div>


    <?php
    pagefooter();
}
?>