 <div class="container">
     <ul class="link-items">
         <li class="link-item">
             @if (Auth::user()->user_id == 'admin')
                 <a href={{ route('rekam.medis') }} class="link">
                     <ion-icon name="book-outline"></ion-icon>
                     <span style="--i: 1">Rekam Medis</span>
                 </a>
             @else
                 <a href={{ route('pemeriksaan') }} class="link">
                     <ion-icon name="book-outline"></ion-icon>
                     <span style="--i: 1">Rekam Medis</span>
                 </a>
             @endif
         </li>
         @if (Auth::user()->user_id == 'admin')
             <li class="link-item">
                 <a href={{ route('dokter') }} class="link">
                     <ion-icon name="person-outline"></ion-icon>
                     <span style="--i: 2">Dokter</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href={{ route('pasien') }} class="link">
                     <ion-icon name="people-outline"></ion-icon>
                     <span style="--i: 3">Pasien</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href={{ route('tindakan') }} class="link">
                     <ion-icon name="accessibility-outline"></ion-icon>
                     <span style="--i: 4">Tindakan</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href="{{ route('obat') }}" class="link">
                     <ion-icon name="medkit-outline"></ion-icon><span style="--i: 5">Obat</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href="{{ route('poli') }}" class="link">
                     <ion-icon name="business-outline"></ion-icon><span style="--i: 5">Poli klinik</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href="{{ route('lab') }}" class="link">
                     <ion-icon name="flask-outline"></ion-icon>
                     <span style="--i: 6">Labotarium</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href="{{ route('kunjungan') }}" class="link">
                     <ion-icon name="stopwatch-outline"></ion-icon>
                     <span style="--i: 7">Kunjungan</span>
                 </a>
             </li>
             <li class="link-item">
                 <a href="#" class="link">
                     <ion-icon name="stats-chart-outline"></ion-icon>
                     <span style="--i: 6">Laporan</span>
                 </a>
             </li>
         @endif
         <li class="link-item">
             <a href={{ route('logout') }} onclick="return confirm('yakin ingin keluar?');" class="link">
                 <ion-icon name="exit-outline"></ion-icon>
                 <span style="--i: 9">
                     <h4>{{ Auth::user()->username }}</h4>
                     <p>{{ Auth::user()->user_id }}</p>
                 </span>
             </a>
         </li>

     </ul>
 </div>
