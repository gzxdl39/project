
  {{-- 包含页头 --}}
  @include('Home.common.header')
   
  {{-- 继承后插入的内容 --}}
  @yield('content')
   
  {{-- 包含页脚 --}}
  @include('Home.common.footer')
