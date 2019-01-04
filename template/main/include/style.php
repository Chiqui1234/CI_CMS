<style>
:root {
    --borderBoxPanelCustom:  #94cc39 ;
}
#root .box.mainMultimedia, #root .box.nav, #root .box.mainMultimedia, #root .box.sidebar, #root .box.footer {
    grid-template-columns: 100%;
    grid-template-rows: 1fr 1fr;
    grid-gap: 5px;
    border: 1px solid var(--borderBoxPanelCustom);
}
#root .box input[type=submit] {
    border-radius: 0;
}
#root .box #old {
    opacity: 0.5;
}
#root .box #old:hover {
    opacity: 1;
}
</style>