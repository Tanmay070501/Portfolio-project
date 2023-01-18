@extends('layouts.app')

@section('content')
<main class="flex-grow-1 container-lg d-flex flex-column justify-content-center">
   <div class="row justify-content-center align-items-center g-4 my-4 mt-md-0 mb-5 text-center text-md-start">
       <div class="col-md-6 order-1 order-md-0">
           <h1>Hi, I'm Tanmay Maheshwari</h1>
           <h4>Web Developer</h4>
           <p>As a front-end web developer, I specialize in taking designs from concept to reality. I am proficient in converting Figma designs into fully functioning websites, utilizing my expertise in HTML, CSS, JavaScript and ReactJS. I am dedicated to ensuring that each project is not only pixel perfect but also fully responsive and interactive. My attention to detail and ability to work closely with designers allows me to bring their vision to life, resulting in seamless user experiences. I am always eager to take on new projects and challenges, and I am dedicated to delivering high-quality results on time and on budget.</p>
           <a class="btn btn-dark" href={{ route('resume') }}>Resume</a>
       </div>
       <div class="col-md-6 order-0 order-md-1">
       <div class="w-100 h-100">
       <img class="object-fit-contain d-block mx-auto" src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortFlat&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=Black&eyeType=Happy&eyebrowType=AngryNatural&mouthType=Smile&skinColor=Tanned'/>
       </div>
       </div>
   </div>
</main>
@endsection
@guest
@else
@endguest
