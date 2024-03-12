<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic&subset=latin,cyrillic);

    body {
        margin: 0;
        padding: 0;
        mso-line-height-rule: exactly;
        min-width: 100%;
    }

    .wrapper {
        display: table;
        margin-top: 40px;
        table-layout: fixed;
        width: 100%;
        min-width: 620px;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    body,
    .wrapper {
        background-color: #ffffff;
    }

    /* Basic */
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    table.center {
        margin: 0 auto;
        width: 602px;
    }

    td {
        padding: 0;
        vertical-align: top;
    }

    .spacer,
    .border {
        font-size: 1px;
        line-height: 1px;
    }

    .spacer {
        width: 100%;
        line-height: 16px
    }

    .border {
        background-color: #e0e0e0;
        width: 1px;
    }

    .padded {
        padding: 0 24px;
    }

    img {
        border: 0;
        -ms-interpolation-mode: bicubic;
    }

    .image {
        font-size: 12px;
    }

    .image img {
        display: block;
    }

    strong,
    .strong {
        font-weight: 700;
    }

    h1,
    h2,
    h3,
    p,
    ol,
    ul,
    li {
        margin-top: 0;
    }

    ol,
    ul,
    li {
        padding-left: 0;
    }

    /* Top panel */
    .title {
        text-align: left;
    }

    .subject {
        text-align: right;
    }

    .title,
    .subject {
        width: 300px;
        padding: 8px 0;
        color: #616161;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 14px;
    }

    /* Header */
    .logo {
        padding: 16px 0;
    }

    

    /* Main */
    .main {
        -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
        -moz-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
    }

    /* Content */
    .columns {
        margin: 0 auto;
        width: 600px;
        background-color: #ffffff;
        font-size: 14px;
    }

    .column {
        text-align: left;
        background-color: #ffffff;
        font-size: 14px;
    }

    .column-top {
        font-size: 24px;
        line-height: 24px;
    }

    .content {
        width: 100%;
    }

    .column-bottom {
        font-size: 8px;
        line-height: 8px;
    }

    .content h1 {
        margin-top: 0;
        margin-bottom: 16px;
        color: #212121;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 20px;
        line-height: 28px;
    }

    .content p {
        margin-top: 0;
        margin-bottom: 16px;
        color: #212121;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
    }

    .content .caption {
        color: #616161;
        font-size: 12px;
        line-height: 20px;
    }

    /* Footer */
    .signature,
    .subscription {
        vertical-align: bottom;
        width: 300px;
        padding-top: 8px;
        margin-bottom: 16px;
    }

    .signature {
        text-align: left;
    }

    .subscription {
        text-align: right;
    }

    .signature p,
    .subscription p {
        margin-top: 0;
        margin-bottom: 8px;
        color: #616161;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
    }

    @media only screen and (min-width: 0) {
        .wrapper {
            text-rendering: optimizeLegibility;
        }
    }

    @media only screen and (max-width: 620px) {
        [class=wrapper] {
            min-width: 302px !important;
            width: 100% !important;
        }

        [class=wrapper] .block {
            display: block !important;
        }

        [class=wrapper] .hide {
            display: none !important;
        }

        [class=wrapper] .top-panel,
        [class=wrapper] .header,
        [class=wrapper] .main,
        [class=wrapper] .footer {
            width: 302px !important;
        }

        [class=wrapper] .title,
        [class=wrapper] .subject,
        [class=wrapper] .signature,
        [class=wrapper] .subscription {
            display: block;
            float: left;
            width: 300px !important;
            text-align: center !important;
        }

        [class=wrapper] .signature {
            padding-bottom: 0 !important;
        }

        [class=wrapper] .subscription {
            padding-top: 0 !important;
        }
    }
</style>

<center class="wrapper">
    <table class="top-panel center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="title" width="300">Xoss Game</td>
                <td class="subject" width="300"><a class="strong" href="#" target="_blank">support@xoss.games</a>
                </td>
            </tr>
            <tr>
                <td class="border" colspan="2">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <div class="spacer">&nbsp;</div>

    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="column">
                    <div class="column-top">&nbsp;</div>
                    <table class="content" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="padded">

                                    <table style="width:100%">
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td>{{ $details['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone Number<strong></td>
                                            <td>{{ $details['phonenumber'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td>
                                            <td>{{ $details['email'] }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Reason</strong></td>
                                            <td>
                                                @if ($details['reason'] == 1)
                                                    Login Problem
                                                @elseif($details['reason'] == 2)
                                                    Subscription Problem
                                                @else
                                                    Others Problem
                                                @endif
                                            </td>
                                        </tr>

                                        @if ($details['reason'] == 1)
                                            <tr>
                                                <td><strong>Login Number</strong></td>
                                                <td>{{ $details['register_number'] }}</td>
                                            </tr>
                                        @elseif($details['reason'] == 2)
                                            <tr>
                                                <td><strong>Subscrib Number</strong></td>
                                                <td>{{ $details['subscrib_number'] }}</td>
                                            </tr>
                                        @else
                                        @endif


                                        <tr>
                                            <td><strong>Message</strong></td>
                                            <td>{{ $details['message'] }}</td>
                                        </tr>

                                    </table><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="column-bottom">&nbsp;</div>
                </td>
            </tr>
        </tbody>
    </table>
</center>
