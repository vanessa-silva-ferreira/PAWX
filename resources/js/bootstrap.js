import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

console.log(`
           ____,'\`-,
      _,--'   ,/::.;
   ,-'       ,/::,' \`---.___        ___,_
   |       ,:';:/        ;'"\`;"\`--./ ,-^.;--.
   |:     ,:';,'         '         \`.   ;\`   \`-.
    \\:.,:::/;/ -:.                   \`  | \`     \`-.
     \\:::,'//__.;  ,;  ,  ,  :.\`-.   :. |  ;       :.
      \\,',';/O)^. :'  ;  :   '__\` \`  :::\`.       .:' )
      |,'  |\\__,: ;      ;  '/O)\`.   :::\`;       ' ,'
           |\`--''            \\__,' , ::::(       ,'
           \`    ,            \`--' ,: :::,'\\   ,-'
            | ,;         ,    ,::'  ,:::   |,'
            |,:        .(          ,:::|   \`
            ::'_   _   ::         ,::/:|
           ,',' \`-' \\   \`.      ,:::/,:|
          | : _  _   |   '     ,::,' :::
          | \\ O\`'O  ,',   ,    :,'   ;::
           \\ \`-'\`--',:' ,' , ,,'      ::
            \`\`:.:.__   ',-','        ::'
               \`--.__, ,::.         ::'
                   |:  ::::.       ::'
                   |:  ::::::    ,::'
`);
