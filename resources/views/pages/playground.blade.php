@extends('layouts.app')

@section('title', 'Python Playground')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.17/codemirror.min.css">
<style>
#editorContainer {
    position: relative;
    overflow: hidden;
}
#editorContainer .CodeMirror {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: auto;
    font-family: 'JetBrains Mono', monospace;
    font-size: 14px;
    line-height: 1.7;
    background: #04091a;
    color: rgba(255,255,255,0.9);
}
@media (max-width: 640px) {
    #editorContainer .CodeMirror {
        font-size: 10px;
        line-height: 1.5;
    }
}
#editorContainer .CodeMirror-gutters {
    background: #04091a;
    border-right: 1px solid rgba(255,255,255,0.05);
}
#editorContainer .CodeMirror-linenumber {
    color: rgba(255,255,255,0.15);
    padding: 0 12px 0 6px;
}
#editorContainer .CodeMirror-cursor {
    border-color: #6b9ff7;
}
#editorContainer .CodeMirror-selected {
    background: rgba(59,124,244,0.2);
}
#editorContainer .CodeMirror-scroll {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: auto;
}
#editorContainer .cm-keyword { color: #c792ea; }
#editorContainer .cm-operator { color: #89ddff; }
#editorContainer .cm-variable-2 { color: #eeffff; }
#editorContainer .cm-variable-3 { color: #82aaff; }
#editorContainer .cm-builtin { color: #82aaff; }
#editorContainer .cm-atom { color: #f78c6c; }
#editorContainer .cm-number { color: #f78c6c; }
#editorContainer .cm-def { color: #82aaff; }
#editorContainer .cm-string { color: #c3e88d; }
#editorContainer .cm-string-2 { color: #c3e88d; }
#editorContainer .cm-comment { color: #546e7a; font-style: italic; }
#editorContainer .cm-meta { color: #89ddff; }
#editorContainer .cm-tag { color: #f07178; }
#editorContainer .cm-attribute { color: #c792ea; }
#editorContainer .cm-property { color: #89ddff; }
#editorContainer .cm-punctuation { color: #89ddff; }
#editorContainer .cm-bracket { color: #eeffff; }
#editorContainer .CodeMirror-matchingbracket {
    color: #fff !important;
    background: rgba(107,159,247,0.2);
    border-bottom: 1px solid #6b9ff7;
}

[data-theme="light"] #editorContainer .CodeMirror {
    background: #ffffff;
    color: #1e293b;
}
[data-theme="light"] #editorContainer .CodeMirror-gutters {
    background: var(--color-playground-gutter);
    border-right: 1px solid #e2e8f0;
}
[data-theme="light"] #editorContainer .CodeMirror-linenumber {
    color: #64748b;
}
[data-theme="light"] #editorContainer .CodeMirror-cursor {
    border-color: #3b82f6;
}
[data-theme="light"] #editorContainer .CodeMirror-selected {
    background: rgba(59,130,246,0.15);
}
[data-theme="light"] #editorContainer .cm-keyword { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-operator { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-variable-2 { color: #1e293b; }
[data-theme="light"] #editorContainer .cm-variable-3 { color: #1e293b; }
[data-theme="light"] #editorContainer .cm-builtin { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-atom { color: #1e293b; }
[data-theme="light"] #editorContainer .cm-number { color: #1e293b; }
[data-theme="light"] #editorContainer .cm-def { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-string { color: #1e293b; }
[data-theme="light"] #editorContainer .cm-string-2 { color: #1e293b; }
[data-theme="light"] #editorContainer .cm-comment { color: #94a3b8; font-style: italic; }
[data-theme="light"] #editorContainer .cm-meta { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-tag { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-attribute { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-property { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-punctuation { color: #2563eb; }
[data-theme="light"] #editorContainer .cm-bracket { color: #1e293b; }
[data-theme="light"] #editorContainer .CodeMirror-matchingbracket {
    color: #1e293b !important;
    background: rgba(59,130,246,0.1);
    border-bottom: 1px solid #3b82f6;
}
</style>
@endpush

@section('content')
<div class="pt-16 min-h-screen bg-ink-950 flex flex-col">
    <!-- Premium Header (Badge Page Style) -->
    <div class="relative overflow-hidden pt-12 pb-8 flex-shrink-0">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1400px] pointer-events-none">
            <div class="absolute top-[-100px] right-[-100px] w-[400px] h-[400px] bg-brand-amber/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] left-[-100px] w-[300px] h-[300px] bg-brand-blue/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[1280px] mx-auto px-7 relative z-10">
            <div class="flex flex-col md:flex-row items-center md:items-end justify-between gap-8">
                <div class="text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-green/10 border border-brand-green/20 text-[11px] font-bold uppercase tracking-wider mb-4" style="color:var(--color-playground-badge-text);">
                        <i class="fa-solid fa-terminal text-[10px]"></i> Python Playground
                    </div>
                    <h1 class="text-4xl md:text-5xl font-semibold mb-3 tracking-tight"><span style="color:var(--color-playground-title);">Coba </span><span style="color:var(--color-playground-accent);">Kode Python</span></h1>
                    <p class="text-lg max-w-xl" style="color:var(--color-playground-desc);">
                        Tulis, jalankan, dan eksperimen kode Python langsung di browser tanpa perlu install apa pun.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1280px] mx-auto w-full px-4 md:px-7 flex-1 flex flex-col pb-6 relative z-10 min-h-0">
            <div class="flex-1 flex flex-col min-h-0 bg-surface-1 rounded-[12px] sm:rounded-[16px] overflow-hidden relative" style="border:1px solid var(--color-playground-border);box-shadow:var(--shadow-playground);">
            <div class="flex-1 flex flex-col min-h-0 min-h-[300px] relative">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-brand-green/0 via-brand-green/40 to-brand-green/0 pointer-events-none"></div>
                <div class="px-3 sm:px-5 py-2 border-b border-white/5 flex items-center gap-3 flex-shrink-0" style="background-color:var(--color-playground-toolbar);">
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color:var(--color-playground-label);">main.py</span>
                </div>
                <div id="editorContainer" class="flex-1 min-h-0"></div>
            </div>

            <div class="h-px bg-white/5"></div>

            <div class="flex flex-col min-h-0 min-h-[250px] lg:max-h-[300px] relative">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-brand-blue/0 via-brand-blue/40 to-brand-blue/0 pointer-events-none"></div>
                <div class="px-3 sm:px-5 py-2 border-b border-white/5 flex items-center justify-between flex-shrink-0" style="background-color:var(--color-playground-toolbar);">
                    <div class="flex items-center gap-2">
                        <span class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest" style="color:var(--color-playground-label);">
                            <i class="fa-solid fa-terminal text-xs text-brand-blue-light"></i> Output
                        </span>
                        <span id="statusDot" class="hidden w-2 h-2 rounded-full bg-brand-green animate-pulse"></span>
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <button id="runBtn" onclick="runCode()" class="px-3 sm:px-4 py-1.5 rounded-xl font-bold text-[10px] transition-all duration-300 active:scale-[0.95] flex items-center gap-1.5" style="background-color:var(--color-playground-btn-bg);color:var(--color-playground-btn-text);">
                            <i class="fa-solid fa-play text-[8px]"></i>
                            <span class="hidden sm:inline">Jalankan</span>
                        </button>
                        <span id="execTime" class="text-[10px] text-text-muted font-mono hidden"></span>
                        <button onclick="clearOutput()" class="text-[10px] text-text-muted hover:text-white transition-colors px-1.5 py-1 rounded-lg hover:bg-white/5" title="Bersihkan output">
                            <i class="fa-solid fa-eraser"></i>
                        </button>
                    </div>
                </div>
                <div class="relative flex-1 min-h-0 overflow-hidden">
                    <pre id="outputPanel" class="absolute inset-0 overflow-y-auto p-3 sm:p-5 font-mono text-xs sm:text-sm leading-relaxed m-0 whitespace-pre-wrap break-words bg-ink-950/30 text-content"><span class="text-text-muted/40 text-xs">// Hasil eksekusi akan muncul di sini</span></pre>
                    <div id="outputEmpty" class="absolute inset-0 flex flex-col items-center justify-center p-4 sm:p-8 pointer-events-none">
                        <div class="w-10 h-10 sm:w-14 sm:h-14 rounded-2xl bg-surface-2/50 border border-white/5 flex items-center justify-center mb-3 sm:mb-4">
                            <i class="fa-solid fa-play text-text-muted/30 text-lg sm:text-xl"></i>
                        </div>
                        <p class="text-text-muted/40 text-xs sm:text-sm font-medium">Klik <span class="font-bold" style="color:var(--color-playground-empty-accent);">Jalankan</span> untuk melihat hasil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="inputModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-ink-950/80 backdrop-blur-md hidden">
    <div class="relative bg-surface-1 border border-white/10 rounded-[28px] w-full max-w-md shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-green/0 via-brand-green to-brand-green/0"></div>
        <div class="p-6 border-b border-white/5 flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-green/10 flex items-center justify-center text-brand-green">
                <i class="fa-solid fa-keyboard"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-white">Input Dibutuhkan</h3>
                <p id="inputModalDesc" class="text-xs text-text-secondary">Kode menggunakan <span id="inputCount" class="text-brand-green-light font-bold">0</span> x <code class="text-brand-green-light font-mono">input()</code></p>
            </div>
        </div>
        <div id="inputFieldsContainer" class="p-6 overflow-y-auto space-y-4">
        </div>
        <div class="p-6 pt-0 flex items-center gap-3">
            <button onclick="closeInputModal()" class="flex-1 py-3 rounded-xl bg-white/5 text-white font-bold text-sm border border-white/10 hover:bg-white/10 transition-all">Batal</button>
            <button onclick="submitWithInput()" class="flex-1 py-3 rounded-xl bg-brand-green text-white font-bold text-sm hover:bg-brand-green-light hover:shadow-[0_10px_20px_rgba(31,184,122,0.3)] transition-all">Kirim & Jalankan</button>
        </div>
    </div>
</div>

<style>
#outputPanel::-webkit-scrollbar { width: 8px; }
#outputPanel::-webkit-scrollbar-track { background: transparent; }
#outputPanel::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.06); border-radius: 10px; border: 2px solid transparent; background-clip: padding-box; }
#outputPanel::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.1); }
</style>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.17/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.17/mode/python/python.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.17/addon/edit/matchbrackets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.17/addon/edit/closebrackets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.17/addon/selection/active-line.min.js"></script>
<script>
(function() {
    var container = document.getElementById('editorContainer');
    if (!container) { console.error('editorContainer not found'); return; }

    window.__editor = CodeMirror(container, {
        value: 'print("Hello, Python!")\nprint(2 + 2)\nprint("Belajar Python menyenangkan!")',
        mode: 'python',
        lineNumbers: true,
        indentUnit: 4,
        indentWithTabs: false,
        matchBrackets: true,
        styleActiveLine: false,
        autoCloseBrackets: true,
        extraKeys: {
            "Tab": function(cm) { cm.replaceSelection("    ", "end"); },
            "Ctrl-Enter": function(cm) { runCode(); },
            "Cmd-Enter": function(cm) { runCode(); },
        }
    });

    window.__editor.focus();

    var outputPanel = document.getElementById('outputPanel');
    var outputEmpty = document.getElementById('outputEmpty');
    var runBtn = document.getElementById('runBtn');
    var execTime = document.getElementById('execTime');
    var statusDot = document.getElementById('statusDot');

    function toggleEmptyState() {
        if (outputPanel.textContent.trim() === '' || outputPanel.textContent.trim() === '// Hasil eksekusi akan muncul di sini') {
            outputEmpty.classList.remove('hidden');
            outputPanel.classList.add('opacity-0');
        } else {
            outputEmpty.classList.add('hidden');
            outputPanel.classList.remove('opacity-0');
        }
    }

    toggleEmptyState();

    var pendingCode = null;

    function extractInputCalls(code) {
        var calls = [];
        var regex = /input\s*\(\s*(?:"([^"]*)"|'([^']*)'|)\s*\)/g;
        var match;
        while ((match = regex.exec(code)) !== null) {
            calls.push({ prompt: match[1] || match[2] || '' });
        }
        return calls;
    }

    window.runCode = function() {
        var code = window.__editor.getValue().trim();
        if (!code) return;

        var calls = extractInputCalls(code);
        if (calls.length > 0) {
            pendingCode = code;
            document.getElementById('inputCount').textContent = calls.length;
            var container = document.getElementById('inputFieldsContainer');
            container.innerHTML = '';
            calls.forEach(function(c, i) {
                var wrapper = document.createElement('div');
                var label = document.createElement('label');
                label.className = 'block text-[10px] font-bold text-text-muted uppercase tracking-widest mb-1.5';
                label.textContent = 'Input #' + (i + 1) + (c.prompt ? ': "' + c.prompt + '"' : '');
                var input = document.createElement('input');
                input.type = 'text';
                input.className = 'input-field w-full bg-ink-950 border border-white/5 rounded-xl px-4 py-2.5 text-sm text-white font-mono placeholder:text-text-muted/30 outline-none focus:border-brand-green/30 transition-all';
                input.placeholder = c.prompt || 'Tulis nilai input...';
                input.autocomplete = 'off';
                input.spellcheck = false;
                wrapper.appendChild(label);
                wrapper.appendChild(input);
                container.appendChild(wrapper);
            });
            setTimeout(function() {
                container.querySelector('.input-field')?.focus();
            }, 100);
            document.getElementById('inputModal').classList.remove('hidden');
            return;
        }

        executeCode(code, '');
    };

    window.closeInputModal = function() {
        document.getElementById('inputModal').classList.add('hidden');
        pendingCode = null;
    };

    document.getElementById('inputModal').addEventListener('click', function(e) {
        if (e.target === this) closeInputModal();
    });

    document.getElementById('inputModal').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            var fields = document.querySelectorAll('.input-field');
            var last = fields[fields.length - 1];
            if (e.target === last || fields.length === 1) {
                e.preventDefault();
                submitWithInput();
            }
        }
    });

    window.submitWithInput = function() {
        var fields = document.querySelectorAll('.input-field');
        var values = [];
        fields.forEach(function(f) { values.push(f.value); });
        var stdin = values.join('\n');
        document.getElementById('inputModal').classList.add('hidden');
        if (pendingCode) {
            executeCode(pendingCode, stdin);
            pendingCode = null;
        }
    };

    function executeCode(code, stdin) {
        outputEmpty.classList.add('hidden');
        outputPanel.classList.remove('opacity-0');

        runBtn.disabled = true;
        runBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-[10px]"></i><span>Menjalankan...</span>';
        execTime.classList.add('hidden');
        statusDot.classList.remove('hidden');
        statusDot.className = 'w-2 h-2 rounded-full bg-brand-amber animate-pulse';

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('{{ route("playground.execute") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ code: code, stdin: stdin }),
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data.success) {
                outputPanel.innerHTML = '';
                outputPanel.appendChild(document.createTextNode(data.output));
                statusDot.className = 'w-2 h-2 rounded-full bg-brand-green';
            } else {
                outputPanel.innerHTML = '<span class="text-brand-red">' + escapeHtml(data.stderr || data.output) + '</span>';
                statusDot.className = 'w-2 h-2 rounded-full bg-brand-red';
            }
            if (data.time) {
                execTime.textContent = data.time + 's' + (data.memory ? ' · ' + data.memory + ' KB' : '');
                execTime.classList.remove('hidden');
            }
            setTimeout(function() { statusDot.classList.add('hidden'); }, 2000);
        })
        .catch(function(err) {
            outputPanel.innerHTML = '<span class="text-brand-red">Gagal: ' + escapeHtml(err.message) + '</span>';
            statusDot.className = 'w-2 h-2 rounded-full bg-brand-red';
            setTimeout(function() { statusDot.classList.add('hidden'); }, 2000);
        })
        .finally(function() {
            runBtn.disabled = false;
            runBtn.innerHTML = '<i class="fa-solid fa-play text-[10px]"></i><span>Jalankan</span>';
        });
    }

    window.resetCode = function() {
        window.__editor.setValue('print("Hello, Python!")\nprint(2 + 2)\nprint("Belajar Python menyenangkan!")');
        clearOutput();
        window.__editor.focus();
    };

    window.clearOutput = function() {
        outputPanel.textContent = '// Hasil eksekusi akan muncul di sini';
        execTime.classList.add('hidden');
        statusDot.classList.add('hidden');
        toggleEmptyState();
    };

    function escapeHtml(str) {
        var d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }

    window.addEventListener('resize', function() { window.__editor.refresh(); });
})();
</script>
@endpush
