<?php
$redirection_target = get_option( 'develjet_headless_redirection_link');

if ( !empty( $redirection_target ) ) :
  header('Location: ' . $redirection_target, 301);
else : ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
    <?php wp_head(); ?>
    <style>
      html {
        padding: 0;
        margin: 0;
      }
      body {
        width: 100%;
        height: 100vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        color: #003087;
      }
      h1 {
        margin-bottom: 0.5rem;
      }
      p {
        margin: 0;
      }
      #logo {
        width: 75px;
        margin-top: auto;
        margin-inline: auto;
      }
      #reference {
        margin: auto auto 1rem auto;
        font-size: 10px;
        text-decoration: none;
        color: #003087;
      }
    </style>
  </head>
  <body>
  <svg id="logo" data-name="Develjet Logo" viewBox="0 0 180 180">
  <defs>
    <style>
      .cls-1 {
        fill: #003087;
        stroke-width: 0px;
      }
    </style>
  </defs>
  <g id="isotype">
    <path class="cls-1" d="m179.12.89c-37.24-4.43-76.08,7.63-104.66,36.2-13.58,13.58-23.43,29.48-29.56,46.43,10.63,5.71,20.6,13.06,29.56,22.03,8.97,8.97,16.3,18.93,22.02,29.56,16.95-6.12,32.85-15.98,46.43-29.56,28.58-28.58,40.65-67.4,36.2-104.66h.01Zm-80.42,80.42c-12.72-12.72-12.72-33.4,0-46.12s33.4-12.7,46.12,0c12.72,12.72,12.72,33.4,0,46.12-12.72,12.72-33.4,12.72-46.12,0Z"/>
    <path class="cls-1" d="m32.09,77.54c-10.36-4.15-21.15-6.88-32.09-8.19,13.3-12.38,29.86-19.28,46.79-20.67-6.09,9.13-10.98,18.82-14.71,28.86h.01Z"/>
    <path class="cls-1" d="m110.68,180c-1.31-10.94-4.04-21.73-8.21-32.08,10.04-3.72,19.73-8.62,28.86-14.71-1.39,16.94-8.29,33.48-20.65,46.79Z"/>
    <path class="cls-1" d="m68.98,120.32l-35.07,35.07c-2.65-.36-5.31-.81-7.96-1.33-.51-2.64-.96-5.29-1.33-7.96l35.07-35.07c1.62,1.44,3.22,2.95,4.78,4.51,1.56,1.56,3.06,3.15,4.51,4.78Z"/>
    <path class="cls-1" d="m84.25,142.2l-13.43,13.43c-6.52.82-13.08,1.17-19.64,1.06l26.02-26.02c2.6,3.72,4.96,7.57,7.06,11.52Z"/>
    <path class="cls-1" d="m49.33,102.81l-26,26c-.11-6.56.24-13.12,1.06-19.64l13.43-13.43c3.95,2.1,7.79,4.45,11.52,7.06h-.01Z"/>
    <path class="cls-1" d="m108.76,71.26c-7.18-7.18-7.18-18.86,0-26.04,7.18-7.18,18.86-7.18,26.04,0,7.18,7.18,7.18,18.86,0,26.04-7.18,7.18-18.86,7.18-26.04,0Z"/>
  </g>
</svg>
    <h1><?php _e( 'Welcome to your new project!', 'develjet-headless' ); ?></h1>
    <p><?php _e( 'Everything is ready for you to start creating an amazing website...', 'develjet-headless' ); ?></p>
    <a id="reference" href="https://develjet.com" target="_blank">Powered by Develjet&reg;</a>
    <?php wp_footer(); ?>
  </body>
</html>

<?php
endif;
