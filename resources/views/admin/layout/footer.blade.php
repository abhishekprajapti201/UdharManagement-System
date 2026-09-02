  <script>
    (function(){
      // Mobile menu toggle (simple)
      const menuBtn = document.querySelector('.md\\:hidden');
      const sidebar = document.querySelector('aside');
      if(menuBtn && sidebar) {
        menuBtn.addEventListener('click', function(e){
          e.stopPropagation();
          sidebar.classList.toggle('hidden');
          sidebar.classList.toggle('flex');
        });
      }

      // small demo: action buttons (just feedback)
      const actionBtns = document.querySelectorAll('tbody .fa-ellipsis-vertical');
      actionBtns.forEach(btn => {
        btn.closest('button').addEventListener('click', function(e){
          e.stopPropagation();
          const row = this.closest('tr');
          const name = row?.querySelector('.font-medium')?.innerText || 'user';
          alert(`🔹 Actions for ${name}\n(Edit, suspend, or delete)`);
        });
      });

      // Add user button
      const addUserBtn = document.querySelector('.bg-blue-600');
      if(addUserBtn) {
        addUserBtn.addEventListener('click', function(){
          alert('✨ Open "Add user" form (Udharmanagement)');
        });
      }

      // stat cards click (demo)
      document.querySelectorAll('.stat-card').forEach((card, idx) => {
        card.style.cursor = 'pointer';
        card.addEventListener('click', function(){
          const label = this.querySelector('.text-sm')?.innerText || 'stat';
          alert(`📊 ${label} : detailed view`);
        });
      });
    })();
  </script>
