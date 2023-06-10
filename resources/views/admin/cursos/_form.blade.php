 <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->

<div class="m-14"> 
    <div class="space-y-12">
         <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
         <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
 
         <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
             <div class="col-span-full">
             <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">imagem do curso:</label>
             <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                 <div class="text-center">
                 <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                     <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                 </svg>
                 <div class="mt-4 flex text-sm leading-6 text-gray-600">
                     <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                     <span>Upload a file</span>
 
                     <input name="arquivo" type="file">
                     <input type="hidden" name="arquivo" value="{{ isset($row->imagem) ? $row->imagem : '' }}">
                     </label>
                     <p class="pl-1">or drag and drop</p>
                 </div>
                 <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                 </div>
                 @if( isset($row->imagem) )
                     <div class="input-field">
                     <img width="150" src="{{ asset($row->imagem) }}" />
                     </div>
                 @endif
             </div>
             </div>
         </div>
         </div>
 
         <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Informacões pessoais</h2>
         <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
 
         <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
             <div class="sm:col-span-3">
             <label for="Titulo" class="block text-sm font-medium leading-6 text-gray-900">Titulo:</label>
             <div class="mt-2">
                 <input type="text" name="titulo" id="titulo" autocomplete="given-titulo" 
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 
                 " value="{{ isset($row->titulo) ? $row->titulo : '' }}">
             </div>
             </div>
 
             <div class="sm:col-span-3">
             <label for="Descricao" class="block text-sm font-medium leading-6 text-gray-900">Descricao:</label>
             <div class="mt-2">
                 <input type="text" name="descricao" id="descricao" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ isset($row->descricao) ? $row->descricao : '' }}">
             </div>
             </div>
 
             <div class="sm:col-span-4">
             <label for="link" class="block text-sm font-medium leading-6 text-gray-900">Link</label>
             <div class="mt-2">
                 <input id="link" name="link" type="text" autocomplete="link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ isset($row->link) ? $row->link : '' }}">
             </div>
             </div>
 
             <div class="sm:col-span-4">
             <label for="valor" class="block text-sm font-medium leading-6 text-gray-900">Valor</label>
                <div class="mt-2">
                    <input id="valor" name="valor" type="number" autocomplete="valor" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ isset($row->valor) ? $row->valor : '' }}">
                </div>
            </div>
            <div class="sm:col-span-4">
                <label for="valor" class="block text-sm font-medium leading-6 text-gray-900">Publicado</label>
                   <div class="mt-2">
                    <input type="checkbox" name="publicado" id="publicado" value="1" {{ isset($row->publicado) && $row->publicado == 1 ? 'checked' : '' }}>
                </div>
               </div>
         </div>
         </div>
         
     </div>
         <div class="mt-20">
         <div class="border-t border-gray-200"></div>
 </div>    