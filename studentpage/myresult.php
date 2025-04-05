<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/myresult.css">
    <link rel="stylesheet" href="partials/student.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    include("partials/header.php");
    ?>
    <main class="main-content">
    <section class="student-results">
            <h2>Your Exam Results</h2>
            <table class="results-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Mid Exam (20)</th>
                        <th>Assignment (20)</th>
                        <th>Quiz (10)</th>
                        <th>Final Exam (50)</th>
                        <th>Total (100)</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mathematics</td>
                        <td>18</td>
                        <td>17</td>
                        <td>9</td>
                        <td>45</td>
                        <td><strong>89</strong></td>
                        <td><strong>B</strong></td>
                    </tr>
                    <tr>
                        <td>Science</td>
                        <td>19</td>
                        <td>18</td>
                        <td>10</td>
                        <td>48</td>
                        <td><strong>95</strong></td>
                        <td><strong>A</strong></td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>15</td>
                        <td>14</td>
                        <td>8</td>
                        <td>42</td>
                        <td><strong>79</strong></td>
                        <td><strong>C</strong></td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td>12</td>
                        <td>16</td>
                        <td>7</td>
                        <td>38</td>
                        <td><strong>73</strong></td>
                        <td><strong>C</strong></td>
                    </tr>
                    <tr>
                        <td>Geography</td>
                        <td>16</td>
                        <td>15</td>
                        <td>9</td>
                        <td>44</td>
                        <td><strong>84</strong></td>
                        <td><strong>B</strong></td>
                    </tr>
                    <tr>
                        <td>Art</td>
                        <td>20</td>
                        <td>19</td>
                        <td>10</td>
                        <td>49</td>
                        <td><strong>98</strong></td>
                        <td><strong>A</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>