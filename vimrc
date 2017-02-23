set nocompatible
set encoding=utf-8 nobomb
filetype off

set rtp+=~/.vim/bundle/Vundle.vim
call vundle#begin()


" let Vundle manage Vundle
Plugin 'Vundle.vim'

" L9 : Vim-script library
Plugin 'L9'

" solarized color theme
Plugin 'vim-colors-solarized'

" es6 syntax
Plugin 'yajs.vim'

" html5 syntax
Plugin 'html5.vim'

" css3 syntax
Plugin 'vim-css3-syntax'

" automatic closing of quotes, parenthesis, brackets, etc.
Plugin 'delimitMate'

" tab line
Plugin 'vim-airline/vim-airline'


call vundle#end()
filetype plugin indent on


" enable ruler and line numbers
set ruler
set number

" enable solarized theme
syntax enable
let g:solarized_termtrans=1
set background=dark
colorscheme solarized

" soft tabs ftw
set tabstop=4
set softtabstop=4
set shiftwidth=4
set expandtab

" airline config
set noshowmode
set laststatus=2
let g:airline_powerline_fonts=1
let g:airline#parts#ffenc#skip_expected_string='utf-8[unix]'
let g:airline_skip_empty_sections=1
" let g:airline_theme='simple'

" wrap text
" set tw=100
" set formatoptions+=t
set autoindent
set textwidth=80

" ignore case of searches
set ignorecase

" highlight dynamically as pattern is typed
set incsearch

" show the filename in the window titlebar
set title

" don't reset cursor to start of line when moving around
set nostartofline

" show the (partial) command as it's being typed
set showcmd

" don't add empty newlines at the end of files
" set noeol

" start scrolling three lines before the horizontal window border
set scrolloff=3

" disable cursorline in insert mode
set cul
autocmd InsertEnter,InsertLeave * set nocul!

" nicer netrw
let g:netrw_banner=0
let g:netrw_liststyle=3

" strip trailing spaces
fun! <SID>StripTrailingWhitespaces()
  let l = line(".")
  let c = col(".")
  %s/\s\+$//e
  call cursor(l, c)
endfun
autocmd BufWritePre * :call <SID>StripTrailingWhitespaces()

" insert HTML template in new HTML files
:autocmd BufNewFile *.html 0r ~/.vim/templates/html.tpl


"
func! WordProcessorMode()
 setlocal textwidth=80
 setlocal smartindent
 setlocal spell spelllang=en_us
 setlocal noexpandtab
endfu
com! WP call WordProcessorMode()
