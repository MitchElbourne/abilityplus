<?php

get_header();

?>
<main role="main">
  <section id="introduction">
    <div class="container">
      <div class="row">
        <h1 class="col-12 col-lg-8 col-md-9 m-auto">About AbilityPlus</h1>
        <p class="col-12 col-lg-8 col-md-9">Being locally and independently owned since 1989 and not being part of a franchise allows us to be flexible to meet our clients' and candidates' every need.</p>
        <div class="image-wrapper col-12 col-lg-8 col-md-9 m-auto">
          <img src="<?php echo get_theme_file_uri('/assets/illus-about-us-introduction.png'); ?>" alt="AbilityPlus team conversing within the business" class="image-wrapper">
        </div>
      </div><!--row-->
    </div><!--container-->
  </section><!--#introduction-->

  <section id="our-values">
    <div class="container">
      <div class="row">
        <h2 class="h3 col-12 col-lg-8 col-md-9 m-auto">Our Values</h2>
        <p class="entry-text col-12 col-lg-8 col-md-9">Experience, Knowledge and Passion is at the core of what we do. We at Ability Plus have formed long-lasting and trusted relationships with many of the most successful companies on the Isle of Man since we were established in 1989.</p>
        <div class="panel-container">
          <div class="panel">
            <img src="<?php echo get_theme_file_uri('/assets/icon-about-us-bookshelf.png'); ?>" alt="Book icon for expertise in Recruitment Consultancy">
            <h3 class="h6">Connect professionals to the best jobs</h3>
            <p class="sub-text">We know that quality people are the key to our success and take pride in the fact that we are driven, hardworking and motivated Recruitment Consultants who offer personal, dedicated and professional support that you can rely on.</p>
          </div>
          <div class="panel">
            <img src="<?php echo get_theme_file_uri('/assets/icon-about-us-teacups.png'); ?>" alt="Teacups icon, meet us to discuss opportunities">
            <h3 class="h6">Find IOM talent for your open positions</h3>
            <p class="sub-text">We provide staffing solutions for companies that need to fill positions at all levels. So, when it comes to recruitment, when you work with Ability Plus it feels like we are an extension of your internal HR team. </p>
          </div>
          <div class="panel">
            <img src="<?php echo get_theme_file_uri('/assets/icon-about-us-pen-book.png'); ?>" alt="Open book icon showing vacancies and job opportunities">
            <h3 class="h6">New jobs every week</h3>
            <p class="sub-text">Every client - whether you are a small business, large market-leader, or somewhere in-between – is important to us and our blend of experience means that when it comes to recruiting your staff our focus is entirely on you.</p>
          </div>
        </div><!--panel-container-->
      </div><!--row-->
    </div><!--container-->
  </section><!--#our-values-->

  <section id="testimonials">
    <div class="container">
      <div class="row">
        <div class="meta-container col-12 col-lg-4">
          <h2 class="h3">Testimonials</h2>
          <p>Have a look at what some of our fantastic candidates have to say about us</p>
        </div>
        <div id="testimonialCarousel" class="carousel slide col-lg-8 col-12" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <p>I went to Ability Plus a little over a year ago, I wasn't 100% sure at the time I wanted to move but I was starting to feel like I needed a change, Monique was incredibly helpful and immediately put me at ease, she offered me a few options, one of which I was keen on progressing and seeing how it went.  The process was great, I was kept well informed throughout, I was told about every step I would be going through during the hiring process, and not once was I left wondering what was going on.  A year on and I love my "new" job, I feel I was incredibly well matched to the company which is a good skill to have as a recruitment agency!</p>
              <br />
              <p>In short I would definitely recommend them if you're thinking of a move.</p>
              <p class="cite bold">T. Hinkley</p>
            </div>
            <div class="carousel-item">
              <p>Ability Plus is a very professional placement agency. They spent time talking to me about the type of job that I was looking for. Ability Plus went through job interview techniques and made sure that I was ready before they arranged job interviews. Every job interview that was arranged for me was for the type of job that I was looking for. In fact the job that they placed me with offered me a permanent placement after the second month of the three month trial.</p>
              <p class="cite bold">G. Harrison</p>
            </div>
            <div class="carousel-item">
              <p>I found Ability Plus to be the most personable and helpful recruitment agency I have ever been signed up with, and that is across both UK and IOM agencies. They found me a temporary job almost instantly upon moving back to the island and then provided me with a tailor-made service to secure me in a permanent position that finally suits me and that I enjoy. I am extremely grateful; especially to Monique who went above and beyond to keep in touch with me and find me the above-mentioned roles. I continue to recommend Ability Plus and I remain blown away by the experience provided to me.</p>
              <p class="cite bold">C. Jones</p>
            </div>
            <div class="carousel-item">
              <p>My experience with Ability Plus has always been positive and helpful. You listened to what I wanted but also knew what would suit my profile. I was reluctant to go for the role I am currently in as I didn't think it was the right job for me but after reassurance from yourselves I am lucky enough to be with a business that I'm proud to be a part of and enjoy working there.</p>
              <p class="cite bold">F. Corlett</p>
            </div>
            <div class="carousel-item">
              <p>Earlier this year I was unexpectedly made redundant. &nbsp;Ability Plus came highly recommended and on registering with them it was easy to see why. Most of my contact was with Monique but the whole team were helpful, friendly and supportive. As it was 9 years since my last job interview, Monique helped me to prepare for potential interviews which was a huge help and I was lucky enough to be offered a new role within a week of registering. I have now been in my new position for almost 3 months and I absolutely love it. &nbsp;Ability Plus helped me to find the right job for me....not just any job!</p>
              <p class="cite bold">W. Oates</p>
            </div>
          </div>
          <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
            <img src="<?php echo get_theme_file_uri('/assets/svg/icon-carousel-arrow.svg'); ?>" alt="Carousel Icon Arrow">
            <span class="sr-only">Previous Testimonial</span>
          </a>
          <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
            <img src="<?php echo get_theme_file_uri('/assets/svg/icon-carousel-arrow.svg'); ?>" alt="Carousel Icon Arrow">
            <span class="sr-only">Next Testimonial</span>
          </a>
          <ol class="carousel-indicators">
            <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#testimonialCarousel" data-slide-to="1"></li>
            <li data-target="#testimonialCarousel" data-slide-to="2"></li>
            <li data-target="#testimonialCarousel" data-slide-to="3"></li>
            <li data-target="#testimonialCarousel" data-slide-to="4"></li>
          </ol>
        </div>
      </div><!--row-->
    </div><!--container-->
  </section><!--#testimonials-->


  <section id="meet-the-team">
    <div class="container">
      <h2 class="h3">Meet The Team</h2>
      <div class="panel">
        <div class="meta-wrapper">
          <img src="<?php echo get_theme_file_uri('/assets/team-anne.jpg'); ?>" alt="Anne Marie Hanna Owner and Director">
          <h3 class="h5">Anne Marie Hanna</h3>
          <span class="title">Owner / Director</span>
          <div class="connect-container">
            <a class="bold linkedin" href="<?php echo esc_url('https://www.linkedin.com/in/anne-hanna-5921514b/'); ?>">Connect: <?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin.svg'); ?></a>
            <!-- <p class="break">|</p>
            <a href="<?php echo esc_url('#'); ?>" class="email bold"><?php echo get_template_part('/assets/svg/icon-inline-email.svg'); ?> Send Email</a> -->
          </div>
        </div>
        <div class="content">
          <span class="quotemark"></span>
          <h4 class="p">My name is Anne Marie Hanna and I am the Managing Director of Ability Plus Ltd.</h4>
          <p>With over 20 years’ experience in recruitment I am very familiar with the staffing needs of businesses in the Island and I like to get to know the people behind the businesses we work with.</p>
          <p>I have a ‘hands on’ approach when it comes to recruitment; directly engaging with both candidates and clients and matching their needs.</p>
          <p>I am a highly motivated, ambitious individual, who thrives in a high-pressured environment and this flows over into everything I do, including my passion for physical fitness.</p>
          <p>I build friendly, professional relationships and all my business networks find me to be easily approachable when looking to recruit. From providing leading employers with the staff they need, to finding candidates the right job that fits with their lifestyle, I am extremely proud to be able to facilitate long-lasting relationships.</p>
        </div>
      </div>




      <div class="panel">
        <div class="meta-wrapper">
          <img src="<?php echo get_theme_file_uri('/assets/team-clodagh.jpg'); ?>" alt="Clodagh Reeve Recruitment Consultant">
          <h3 class="h5">Clodagh Reeve</h3>
          <span class="title">Recruitment Consultant</span>
          <div class="connect-container">
            <a class="bold linkedin" href="<?php echo esc_url('https://www.linkedin.com/in/clodagh-reeve-certrp-343817134/'); ?>">Connect: <?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin.svg'); ?></a>
            <!-- <p class="break">|</p>
            <a href="<?php echo esc_url('#'); ?>" class="email bold"><?php echo get_template_part('/assets/svg/icon-inline-email.svg'); ?> Send Email</a> -->
          </div>
        </div>
        <div class="content">
          <span class="quotemark"></span>
          <h4 class="p">My name is Clodagh Reeve and I am a Recruitment Consultant at Ability Plus with a background in Hospitality Management.</h4>
          <p>I am a passionate and driven individual who knows how to spot talent when it arises. I build excellent relationships with clients that will allow me to recruit the best possible staff for their businesses. My aim is to find the most suitable candidate for the position and I cover a wide variety of industries and roles at all levels.</p>
        </div>
      </div>


      <div class="panel">
        <div class="meta-wrapper">
          <img src="<?php echo get_theme_file_uri('/assets/team-gemma.jpg'); ?>" alt="Gemma Crossley Secretary">
          <h3 class="h5">Gemma Crossley</h3>
          <span class="title">Secretary</span>
          <div class="connect-container">
            <a class="bold linkedin" href="<?php echo esc_url('#'); ?>">Connect: <?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin.svg'); ?></a>
            <!-- <p class="break">|</p>
            <a href="<?php echo esc_url('#'); ?>" class="email bold"><?php echo get_template_part('/assets/svg/icon-inline-email.svg'); ?> Send Email</a> -->
          </div>
        </div>
        <div class="content">
          <span class="quotemark"></span>
          <h4 class="p">My name is Gemma Crossley and I am a part time Secretary for both Ability Plus and Hospitality Plus.</h4>
          <p>I have over 10 years’ experience within the Finance industry including banking and insurance together with a year of experience in the Recruitment industry. I am a hardworking individual who strives for perfection and enjoys working to tight deadlines.</p>
        </div>
      </div>

      <div class="panel">
        <div class="meta-wrapper">
          <img src="<?php echo get_theme_file_uri('/assets/team-megan.jpg'); ?>" alt="Megan French Juinior Recruitment Administrator">
          <h3 class="h5">Megan French</h3>
          <span class="title">Junior Recruitment Administrator</span>
          <div class="connect-container">
            <a class="bold linkedin" href="<?php echo esc_url('https://www.linkedin.com/in/megan-french-697794186/'); ?>">Connect: <?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin.svg'); ?></a>
            <!-- <p class="break">|</p>
            <a href="<?php echo esc_url('#'); ?>" class="email bold"><?php echo get_template_part('/assets/svg/icon-inline-email.svg'); ?> Send Email</a> -->
          </div>
        </div>
        <div class="content">
          <span class="quotemark"></span>
          <h4 class="p">My name is Megan French and I am a Junior Recruitment Administrator for both Ability Plus and Hospitality Plus.</h4>
          <p>I am the newest member of the team, having finished my A Levels and joining the company in November 2018. I am a friendly and polite individual who works hard and provides a solid support system for the Recruitment Consultants. I also look after Reception and I am the first point of call for Candidates and Clients. I thoroughly enjoy my role  and I am looking forward to building a career within the Recruitment industry.</p>
        </div>
      </div>
    </div><!--container-->
  </section><!--#meet-the-team-->


</main>

<?php
  get_footer();
?>
