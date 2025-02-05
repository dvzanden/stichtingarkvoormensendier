 <section>
     <div class="container">
         <div class="grid grid-cols-1 items-center gap-20 py-10 lg:grid-cols-2 lg:py-32">
             <article class="[&>p]:leading-loose">
                 <h2>
                     {{ $acf['about_title'] }}
                 </h2>
                 {!! $acf['about_text'] !!}
             </article>
             <img src='{{ $acf['about_img'] }}' alt='Over ons' class="w-full" />
         </div>
     </div>
 </section>
