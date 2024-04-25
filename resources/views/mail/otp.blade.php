<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Otp Verification</title>

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body
    style="
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffffff;
      font-size: 14px;
    "
  >
    <div
      style="
        max-width: 680px;
        margin: 0 auto;
        padding: 45px 2px 2px;
        background: royalblue;       
        background-repeat: no-repeat;
        background-size: 800px 452px;
        background-position: top center;
        font-size: 14px;
        color: #434343;
      "
    >
      <header>
        <table style="width: 100%;padding-left: 20px;padding-right: 20px;">
          <tbody>
            <tr style="height: 0;">
              <td class="">
                <h1
                style="
                  margin: 0;
                  font-size: 24px;
                  font-weight: 500;
                  color: #ffffff;
                "
              >
                StcOnline
              </h1>
              </td>
              <td style="text-align: right;">
                <span
                  style="font-size: 16px; line-height: 30px; color: #ffffff;"
                  >{{ \Carbon\Carbon::now()->format('d M Y') }}</span
                >
              </td>
            </tr>
          </tbody>
        </table>
      </header>

      <main>
        <div
          style="
            margin: 0;
            margin-top: 70px;
            padding: 92px 30px 115px;
            background: #ffffff;
            border-radius: 30px;
            text-align: center;
          "
        >
          <div style="width: 100%; max-width: 489px; margin: 0 auto;">
            <h1
              style="
                margin: 0;
                font-size: 24px;
                font-weight: 500;
                color: #000;
              "
            >
              Your OTP
            </h1>
            <p
              style="
                margin: 0;
                margin-top: 17px;
                font-size: 16px;
                font-weight: 500;
              "
            >
              Dear {{ $user->name }},
            </p>
            <p
              style="
                margin: 0;
                margin-top: 17px;
                font-weight: 500;
                letter-spacing: 0.56px;
              "
            >
              We have detected an account sign-in request from a device we do not recognize.
              <br>
        <table style="width: 100%;">
          <tbody>
            <tr style="height: 0;">
              <td style="  border: 1px solid black">
                <h1
                style="
                  margin: 0;
                  font-size: 13px;
                  font-weight: 500;
                  color: #1f1f1f;
                  text-align: left;
                "
              >
                UserId
              </h1>
              </td>
              <td style="text-align: left;border: 1px solid black">
                <span
                  style="font-size: 13px; line-height: 30px; color: #1f1f1f;"
                  >{{ $user->userId}}</span
                >
              </td>
            </tr>
            <tr style="height: 0;">
              <td style="border: 1px solid black">
                <h1
                style="
                  margin: 0;
                  font-size: 13px;
                  font-weight: 500;
                  color: #1f1f1f;
                  text-align: left;
                "
              >
                Time (GMT)
              </h1>
              </td>
              <td style="text-align: left;border: 1px solid black">
                <span
                  style="font-size: 13px; line-height: 30px; color: #1f1f1f;"
                  >{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span
                >
              </td>
            </tr>
            <tr style="height: 0;">
              <td style="border: 1px solid black">
                <h1
                style="
                  margin: 0;
                  font-size: 13px;
                  font-weight: 500;
                  color: #1f1f1f;
                  text-align: left;
                "
              >
                Device
              </h1>
              </td>
              <td style="text-align: left;border: 1px solid black">
                <span
                  style="font-size: 11px; line-height: 30px; color: #1f1f1f;"
                  >{{ $user->useragent }} </span
                >
              </td>
            </tr>
            <tr style="height: 0;">
              <td style="border: 1px solid black">
                <h1
                style="
                  margin: 0;
                  font-size: 13px;
                  font-weight: 500;
                  color: #1f1f1f;
                  text-align: left;
                "
              >
                Location
              </h1>
              </td>
              <td style="text-align: left;border: 1px solid black">
                <span
                  style="font-size: 11px; line-height: 30px; color: #1f1f1f;"
                  >Location is approximate based on the login's IP address </span
                >
              </td>
            </tr>
          </tbody>
        </table>
              <br>
              To verify your accout and sign in, please use the following code as your
              One Time Password- expires in
              <span style="font-weight: 600; color: #1f1f1f;">5 minutes</span>.
              Do not share this code with others, including StcOnline
              employees.
            </p>
            <p
              style="
                margin: 0;
                margin-top: 60px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: 5px;
                color: #000;
              "
            >
              {{ $user->remember_token }}
            </p>
          </div>
        </div>

        <p
          style="
            max-width: 400px;
            margin: 0 auto;
            margin-top: 90px;
            text-align: center;
            font-weight: 500;
            color: #fff;
          "
        >
          Need help? Ask at
          <a
            href="mailto:info@StcOnlines.org"
            style="color: #ffffff; text-decoration: none;"
            >info@stc.online</a
          >
          or visit our
          <a
            href=""
            target="_blank"
            style="color: #ffffff; text-decoration: none;"
            >Help Center</a
          >
        </p>
      </main>

      <footer
        style="
          width: 100%;
          max-width: 490px;
          margin: 20px auto 0;
          text-align: center;
          border-top: 1px solid #e6ebf1;
        "
      >
        <p
          style="
            margin: 0;
            margin-top: 40px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
          "
        >
          StcOnline
        </p>
        <p style="margin: 0; margin-top: 8px; color: #ffffff;">
          Address 540, Newyork, USA.
        </p>
        <!--<div style="margin: 0; margin-top: 16px;">
          <a href="" target="_blank" style="display: inline-block;">
            <img
              width="36px"
              alt="Facebook"
              src="https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661502815169_682499/email-template-icon-facebook"
            />
          </a>
          <a
            href=""
            target="_blank"
            style="display: inline-block; margin-left: 8px;"
          >
            <img
              width="36px"
              alt="Instagram"
              src="https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661504218208_684135/email-template-icon-instagram"
          /></a>
          <a
            href=""
            target="_blank"
            style="display: inline-block; margin-left: 8px;"
          >
            <img
              width="36px"
              alt="Twitter"
              src="https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661503043040_372004/email-template-icon-twitter"
            />
          </a>
          <a
            href=""
            target="_blank"
            style="display: inline-block; margin-left: 8px;"
          >
            <img
              width="36px"
              alt="Youtube"
              src="https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661503195931_210869/email-template-icon-youtube"
          /></a>
        </div>-->
        <p style="margin: 0; margin-top: 16px; color: #ffffff;">
          Copyright © 2024 StcOnline. All rights reserved.
        </p>
      </footer>
    </div>
  </body>
</html>
