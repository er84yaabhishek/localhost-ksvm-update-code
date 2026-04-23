@extends('frontend.layout.app')
@section('content')
    <style>
        .bg-img {
            background: url(watermarkingd008.html?image=&amp;maxim_size=8000) 0 36% no-repeat;
            background-size: auto;
            -webkit-background-size: cover;
            background-size: cover;
        }
    </style>
    <section class="inner-intro bg-img light-color overlay-before parallax-background">
        <div class="container">
            <div class="row title">
                <h2><span>Courses & Subject's</span></h2>
            </div>
        </div>
    </section>
    <style>
        /* .container {
            width: 85%;
            margin: 25px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1);
        } */

        .title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #7c1f82;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            font-size: 16px;
            margin-bottom: 25px;
            color: #444;
        }

        /* Table */
        .class-box {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            text-align: left;
        }

        .class-box th {
            padding: 12px;
            color: white;
            font-size: 18px;
        }

        .class-box td {
            padding: 10px;
            vertical-align: top;
            font-size: 15px;
        }

        /* Header Colors */
        .pg {
            background: #c7e8ff;
        }

        .i-iii {
            background: #ffd6c9;
        }

        .iv-viii {
            background: #ffe9b2;
        }

        .ix-x {
            background: #d3f5c0;
        }

        .xi-xii {
            background: #c6d7ff;
        }

        /* Top Bars */
        .skills-bar {
            width: 100%;
            background: #e5b88a;
            color: black;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
        }

        /* Code of discipline */
        .code-title {
            background: #7c1f82;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .rules {
            line-height: 1.6;
            font-size: 15px;
            color: #333;
        }
    </style>

    <!-- ABOUT SCHOOL SECTION -->
    <section class="py-5 about-section">
        <div class="container">

            <div class="title">Our Curriculum</div>
            <div class="subtitle">
                The school has drawn well structured curriculum based on New Education Policy 2020 to meet the needs of all
                the
                students.
            </div>

            <!-- Classes Table -->
            <table class="class-box" border="1">
                <tr>
                    <th class="pg">P.G., L.K.G., U.K.G.</th>
                    <th class="i-iii">I - III</th>
                    <th class="iv-viii">IV - VIII</th>
                    <th class="ix-x">IX - X</th>
                    <th class="xi-xii">XI - XII</th>
                </tr>
                <tr>
                    <td class="pg">
                        English<br>Hindi<br>Maths<br>E.V.S<br>Poem Recitation<br>Computer
                    </td>
                    <td class="i-iii">
                        English<br>Hindi<br>Maths<br>E.V.S<br>Computer<br>G.K.
                    </td>
                    <td class="iv-viii">
                        English<br>Hindi<br>Maths<br>Science<br>Social Science<br>Computer<br>Sanskrit<br>G.K.
                    </td>
                    <td class="ix-x">
                        English<br>Hindi<br>Maths<br>Science<br>Social Science<br>Computer / Geometrical Art
                    </td>
                    <td class="xi-xii">
                        English<br>Hindi<br>Physics<br>Chemistry<br>Maths/Bio
                    </td>
                </tr>
            </table>

            <!-- Skills -->
            <div class="skills-bar">
                Skills – Art | Music | Dance | Physical Education | Value Education
            </div>

            <!-- Code of Discipline -->
            <div class="code-title">
                Code of Discipline for the Students
            </div>

            <div class="rules">
                <b>Discipline is the habit of acting in accordance with certain rules - Here are some rules to be followed
                    -</b><br><br>

                1. Students are expected to come in proper school uniform. Neatness and cleanliness will be encouraged.<br>
                2. Regularity in attendance is must & praised. A student must get the permission of the Class Teacher or
                Principal in case of leave.<br>
                3. In case a student is absent for more than ten consecutive days without permission, his/her name is liable
                to
                be struck off.<br>
                4. Students suffering from contagious disease are not allowed to attend the school without medical
                fitness.<br>
                5. Misbehavior with teachers or abusive conduct will be dealt with severity.<br>
                6. Damage to school property will be charged to parents.<br>
                7. If a student is called for an extra class or activity, he/she must be present without fail.
            </div>

        </div>
    </section>

@endsection