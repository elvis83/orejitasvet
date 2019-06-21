{{--
  title
  head
  content
  foot
--}}

<!DOCTYPE html>
<html lang="es">
 
  <head>
    <title>@yield('title')</title>    
    @include('theme.backoffice.layouts.includes.head')    
  </head>
  <body>    
    @include('theme.backoffice.layouts.includes.loader')    
    @include('theme.backoffice.layouts.includes.header')   
    <div id="main">      
      <div class="wrapper">                
        @include('theme.backoffice.layouts.includes.left-sidebar')        
        <section id="content">
          @include('theme.backoffice.layouts.includes.breadcrumbs')         
          <div class="container">
            @yield('content')
          </div>          
        </section>        
      </div>      
    </div>    
    @include('theme.backoffice.layouts.includes.footer')
    @include('theme.backoffice.layouts.includes.foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @include('sweet::alert')  
  </body>
</html>