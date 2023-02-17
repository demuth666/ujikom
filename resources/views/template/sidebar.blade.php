 <div class="container">
     <ul class="link-items">
         <li class="link-item active">
             <a href={{ route('rekam.medis') }} class="link">
                 <ion-icon name="book-outline"></ion-icon>
                 <span style="--i: 1">Rekam Medis</span>
             </a>
         </li>
         <li class="link-item">
             <a href="#" class="link">
                 <ion-icon name="person-outline"></ion-icon>
                 <span style="--i: 2">Dokter</span>
             </a>
         </li>
         <li class="link-item">
             <a href="#" class="link">
                 <ion-icon name="people-outline"></ion-icon>
                 <span style="--i: 3">Pasien</span>
             </a>
         </li>
         <li class="link-item">
             <a href="#" class="link">
                 <ion-icon name="bed-outline"></ion-icon>
                 <span style="--i: 4">Ruang</span>
             </a>
         </li>
         <li class="link-item">
             <a href="#" class="link">
                 <ion-icon name="medkit-outline"></ion-icon><span style="--i: 5">Obat</span>
             </a>
         </li>
         <li class="link-item">
             <a href="#" class="link">
                 <ion-icon name="stats-chart-outline"></ion-icon>
                 <span style="--i: 6">Laporan</span>
             </a>
         </li>
         <li class="link-item">
             <a href="#" class="link">
                 <ion-icon name="help-circle-outline"></ion-icon>
                 <span style="--i: 7">help</span>
             </a>
         </li>
         <li class="link-item">
             <a href={{ route('logout') }} class="link">
                 <ion-icon name="exit-outline"></ion-icon>
                 <span style="--i: 9">
                     <h4>{{ Auth::user()->username }}</h4>
                 </span>
             </a>
         </li>
     </ul>
 </div>
