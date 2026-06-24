import sys
import re

with open('tours.html', 'r', encoding='utf-8') as f:
    content = f.read()

# 2. Replace Sections
start_marker = '<!-- SECTION: GUIDED TOURS -->'
end_marker = '<!-- TOUR DETAIL MODAL / POPUP -->'

start_idx = content.find(start_marker)
end_idx = content.find(end_marker)

if start_idx != -1 and end_idx != -1:
    new_sections = '''<!-- SECTION: CATEGORY 1 -->
    <section class="py-32 relative overflow-hidden border-b border-stone-200/40 bg-gradient-to-br from-rose-50 via-sky-50 to-emerald-50 parallax-section" id="cat1">
        <div class="parallax-bg concrete"></div>
        <div class="max-w-[1600px] mx-auto px-6 lg:px-16 relative z-10">
            <div class="mb-24 scroll-reveal">
                <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-2 block">Category 1</span>
                <h2 class="font-serif text-4xl md:text-6xl font-bold uppercase text-brand-luxeDark">E-Bike & Leisure Tours</h2>
                <p class="text-stone-500 font-light text-sm md:text-base mt-4 max-w-xl leading-relaxed tracking-wide font-sans">Designed for visitors who want to explore Bratislava and its surroundings in a relaxed and enjoyable way. These guided rides combine culture, history, local stories and beautiful scenery, making them perfect for travellers, couples, families and leisure riders.</p>
                <div class="h-[1px] w-12 bg-brand-luxeGold mt-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                <!-- Tour 1 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <img src="pictures/Cyclists having a coffee break at a local outdoor cafe, road bikes parked nearby, lifestyle photography, authentic.jpg" alt="Bratislava Highlights Tour" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Bratislava Highlights Tour</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour1')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 2 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <img src="pictures/Corporate cycling group, custom private bike tour, diverse group of people riding together, authentic experience.jpg" alt="Danube Discovery Tour" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Danube Discovery Tour</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour2')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 3 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <img src="pictures/Corporate cycling group, custom private bike tour, diverse group of people riding together, authentic experience.jpg" alt="Wine & Villages Tour" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Wine & Villages Tour</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour3')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 4 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <img src="pictures/sunset_devin.png" alt="Sunset Ride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Sunset Ride</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour4')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CATEGORY 2 -->
    <section class="py-32 relative overflow-hidden bg-brand-luxeDark text-white parallax-section" id="cat2">
        <div class="parallax-bg asphalt opacity-50"></div>
        <div class="max-w-[1600px] mx-auto px-6 lg:px-16 relative z-10">
            <div class="mb-24 scroll-reveal">
                <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-2 block">Category 2</span>
                <h2 class="font-serif text-4xl md:text-6xl font-bold uppercase text-white">Road & Gravel Cycling Experiences</h2>
                <p class="text-stone-400 font-light text-sm md:text-base mt-4 max-w-xl leading-relaxed tracking-wide font-sans">Created for passionate cyclists looking for longer distances, more demanding routes and unforgettable scenery. Ride through vineyards, rolling countryside, quiet roads and cross-border routes in the heart of Central Europe.</p>
                <div class="h-[1px] w-12 bg-brand-luxeGold mt-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                <!-- Tour 5 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-800 relative">
                            <img src="pictures/Cyclists riding during golden hour sunset, warm silhouettes, back light, cinematic photography.jpg" alt="Cross Border Ride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-white mb-3">Cross Border Ride</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour5')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-stone-200 group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 6 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-800 relative">
                            <img src="pictures/Athletic road cyclist climbing a scenic mountain road, gravel bike rider on a dirt trail, endurance.jpg" alt="Little Carpathians Road Ride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-white mb-3">Little Carpathians Road Ride</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour6')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-stone-200 group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 7 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-800 relative">
                            <img src="pictures/Corporate cycling group, custom private bike tour, diverse group of people riding together, authentic experience.jpg" alt="Gravel Through The Vineyards" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-white mb-3">Gravel Through The Vineyards</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour7')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-stone-200 group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 8 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-800 relative">
                            <img src="pictures/professional cyclists ride through the city.jpg" alt="Four Countries Challenge" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-white mb-3">Four Countries Challenge</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour8')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-stone-200 group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CATEGORY 3 -->
    <section class="py-32 relative overflow-hidden bg-stone-50 text-brand-luxeDark parallax-section" id="cat3">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-16 relative z-10">
            <div class="mb-24 scroll-reveal">
                <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-2 block">Category 3</span>
                <h2 class="font-serif text-4xl md:text-6xl font-bold uppercase text-brand-luxeDark">Trail & MTB Adventures</h2>
                <p class="text-stone-500 font-light text-sm md:text-base mt-4 max-w-xl leading-relaxed tracking-wide font-sans">For riders looking for more technical terrain, forest trails and off-road adventures. Explore the Little Carpathians and discover some of the best trail riding opportunities around Bratislava.</p>
                <div class="h-[1px] w-12 bg-brand-luxeGold mt-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                <!-- Tour 9 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <div class="w-full h-full flex items-center justify-center text-stone-400 text-xs uppercase tracking-widest"><img src="pictures/forest.webp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" alt="Forest Trails Explorer" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            <span style="display:none;" class="z-10">Image Pending</span></div>
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Forest Trails Explorer</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour9')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 10 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <div class="w-full h-full flex items-center justify-center text-stone-400 text-xs uppercase tracking-widest"><img src="pictures/mount.webp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" alt="Little Carpathians MTB Ride" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            <span style="display:none;" class="z-10">Image Pending</span></div>
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Little Carpathians MTB Ride</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour10')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 11 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative">
                            <div class="w-full h-full flex items-center justify-center text-stone-400 text-xs uppercase tracking-widest"><img src="pictures/mount2.webp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" alt="Trail Discovery Experience" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            <span style="display:none;" class="z-10">Image Pending</span></div>
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Trail Discovery Experience</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour11')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
                <!-- Tour 12 -->
                <div class="group bg-transparent flex flex-col justify-between transition-colors duration-500 rounded-none scroll-reveal">
                    <div>
                        <div class="aspect-[4/5] overflow-hidden bg-stone-200 relative flex items-center justify-center text-stone-400 text-xs uppercase tracking-widest">
                            <span class="z-10">Image Pending</span>
                        </div>
                        <div class="py-6 px-0">
                            <h3 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Custom MTB Adventure</h3>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-0">
                        <button onclick="openModal('tour12')" class="inline-flex items-center space-x-2 text-[10px] font-bold tracking-[0.2em] uppercase text-brand-luxeDark group-hover:text-brand-luxeGold transition-colors duration-300"><span>View Details</span><i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CATEGORY 4 -->
    <section class="py-32 relative overflow-hidden border-t border-stone-200/40 bg-gradient-to-tr from-amber-50 via-orange-50 to-rose-50 parallax-section" id="cat4">
        <div class="parallax-bg concrete"></div>
        <div class="max-w-5xl mx-auto px-6 text-center relative z-10 scroll-reveal">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-3 block">Category 4</span>
            <h2 class="font-serif text-4xl md:text-6xl font-light text-brand-luxeDark mb-6">Built Around Your Ride</h2>
            <p class="text-stone-500 font-light text-sm max-w-2xl mx-auto leading-relaxed mb-10 tracking-wide font-sans">
                Looking for something unique? We create fully customised cycling experiences for individuals, groups, cycling clubs and corporate teams. From private city tours and wine experiences to multi-day cycling adventures, every detail can be tailored to your preferences.
            </p>
            <div class="flex justify-center gap-4 flex-wrap mb-10">
                <span class="px-4 py-2 border border-brand-luxeGold/30 text-[10px] uppercase tracking-widest text-brand-luxeDark">Private groups</span>
                <span class="px-4 py-2 border border-brand-luxeGold/30 text-[10px] uppercase tracking-widest text-brand-luxeDark">Cycling clubs</span>
                <span class="px-4 py-2 border border-brand-luxeGold/30 text-[10px] uppercase tracking-widest text-brand-luxeDark">Corporate events</span>
                <span class="px-4 py-2 border border-brand-luxeGold/30 text-[10px] uppercase tracking-widest text-brand-luxeDark">Team building</span>
                <span class="px-4 py-2 border border-brand-luxeGold/30 text-[10px] uppercase tracking-widest text-brand-luxeDark">Multi-day holidays</span>
                <span class="px-4 py-2 border border-brand-luxeGold/30 text-[10px] uppercase tracking-widest text-brand-luxeDark">Special occasions</span>
            </div>
            <a href="contact.html?ride=Custom" class="inline-flex items-center justify-center px-10 py-5 bg-brand-luxeDark hover:bg-brand-luxeGold text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none border border-stone-850 shadow-2xl">
                Enquire for Custom Rides
            </a>
        </div>
    </section>
'''
    content = content[:start_idx] + new_sections + '\\n\\n    ' + content[end_idx:]


# 3. Update the modal data object.
modal_data_start = 'const tourData = {'
modal_data_end = '        };'
md_start_idx = content.find(modal_data_start)
md_end_idx = content.find(modal_data_end, md_start_idx)

if md_start_idx != -1 and md_end_idx != -1:
    new_data = '''const tourData = {
            tour1: {
                title: "Bratislava Highlights Tour",
                desc: "Discover the city's historic centre, the Danube waterfront and hidden local gems.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Easy", bike: "City / Hybrid Bike",
                keypoints: ["Historic centre", "Danube waterfront", "Hidden local gems"],
                recom: "Perfect for travellers, couples, families and leisure riders.",
                img: "pictures/Cyclists having a coffee break at a local outdoor cafe, road bikes parked nearby, lifestyle photography, authentic.jpg"
            },
            tour2: {
                title: "Danube Discovery Tour",
                desc: "Enjoy a scenic ride along one of Europe's most famous rivers.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Easy", bike: "Hybrid / Gravel Bike",
                keypoints: ["Scenic river ride", "Europe's famous river"],
                recom: "Perfect for travellers, couples, families and leisure riders.",
                img: "pictures/Corporate cycling group, custom private bike tour, diverse group of people riding together, authentic experience.jpg"
            },
            tour3: {
                title: "Wine & Villages Tour",
                desc: "Explore charming wine towns, vineyards and local culture beyond the city.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Moderate", bike: "Gravel / Road / Hybrid",
                keypoints: ["Charming wine towns", "Vineyards", "Local culture"],
                recom: "Perfect for travellers, couples, families and leisure riders.",
                img: "pictures/Corporate cycling group, custom private bike tour, diverse group of people riding together, authentic experience.jpg"
            },
            tour4: {
                title: "Sunset Ride",
                desc: "Experience Bratislava during the most beautiful hours of the day.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Easy", bike: "City / Hybrid Bike",
                keypoints: ["Most beautiful hours", "Sunset views"],
                recom: "Perfect for travellers, couples, families and leisure riders.",
                img: "pictures/sunset_devin.png"
            },
            tour5: {
                title: "Cross Border Ride",
                desc: "Cycle between Slovakia and Austria on scenic roads and cycle paths.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Moderate", bike: "Road / Gravel Bike",
                keypoints: ["Slovakia and Austria", "Scenic roads", "Cycle paths"],
                recom: "For passionate cyclists looking for longer distances.",
                img: "pictures/Cyclists riding during golden hour sunset, warm silhouettes, back light, cinematic photography.jpg"
            },
            tour6: {
                title: "Little Carpathians Road Ride",
                desc: "Rolling terrain, vineyard landscapes and some of the region's best cycling roads.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Hard", bike: "Road Bike",
                keypoints: ["Rolling terrain", "Vineyard landscapes", "Best cycling roads"],
                recom: "For passionate cyclists looking for longer distances.",
                img: "pictures/Athletic road cyclist climbing a scenic mountain road, gravel bike rider on a dirt trail, endurance.jpg"
            },
            tour7: {
                title: "Gravel Through The Vineyards",
                desc: "A perfect combination of adventure, nature and local wine country.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Moderate", bike: "Gravel / XC Mountain Bike",
                keypoints: ["Adventure and nature", "Local wine country"],
                recom: "For passionate cyclists looking for longer distances.",
                img: "pictures/Corporate cycling group, custom private bike tour, diverse group of people riding together, authentic experience.jpg"
            },
            tour8: {
                title: "Four Countries Challenge",
                desc: "Our signature endurance experience connecting multiple countries in a single ride.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Hard", bike: "Road Bike",
                keypoints: ["Signature endurance", "Multiple countries", "Single ride"],
                recom: "For passionate cyclists looking for longer distances.",
                img: "pictures/professional cyclists ride through the city.jpg"
            },
            tour9: {
                title: "Forest Trails Explorer",
                desc: "A fun introduction to Bratislava's trail network.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Moderate", bike: "MTB",
                keypoints: ["Fun introduction", "Trail network"],
                recom: "For riders looking for more technical terrain and off-road adventures.",
                img: "pictures/forest.webp"
            },
            tour10: {
                title: "Little Carpathians MTB Ride",
                desc: "A guided mountain bike adventure through forests, ridgelines and scenic viewpoints.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Hard", bike: "MTB",
                keypoints: ["Forests and ridgelines", "Scenic viewpoints"],
                recom: "For riders looking for more technical terrain and off-road adventures.",
                img: "pictures/mount.webp"
            },
            tour11: {
                title: "Trail Discovery Experience",
                desc: "A mix of flowing singletracks, forest roads and local favourites.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Moderate", bike: "MTB",
                keypoints: ["Flowing singletracks", "Forest roads", "Local favourites"],
                recom: "For riders looking for more technical terrain and off-road adventures.",
                img: "pictures/mount2.webp"
            },
            tour12: {
                title: "Custom MTB Adventure",
                desc: "Tailor-made trail rides adapted to your skill level and riding style.",
                dist: "TBD", elev: "TBD", dur: "TBD", diff: "Variable", bike: "MTB",
                keypoints: ["Tailor-made rides", "Adapted to skill level", "Custom riding style"],
                recom: "For riders looking for more technical terrain and off-road adventures.",
                img: ""
            }'''
    content = content[:md_start_idx] + new_data + content[md_end_idx:]

with open('tours.html', 'w', encoding='utf-8') as f:
    f.write(content)
print('Done!')
