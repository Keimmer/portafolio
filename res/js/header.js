import { createApp } from 'https://unpkg.com/petite-vue?module'

    createApp({
        menuActive: false,

      setActive() {
          this.menuActive ? this.menuActive = false : this.menuActive = true;
      },
    
}).mount()