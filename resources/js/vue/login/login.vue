<template>
    <div class="flex justify-center">
        <div>
            <h1 class="m-auto">Login</h1>
        </div>
        <div>
            <form class="flex flex-col m-auto">
                <div class="grid grid-col-2 gap-4">
                    <div class="col-span-1 w-auto"> 
                        <label labelFor="loginEmail">Email:</label>
                    </div>
                    <div class="col-span-1 w-auto">
                        <input class="border-2 border-black " name="loginEmail" type="text"/>
                    </div>
                    <div class="col-span-1 w-auto">
                        <label labelFor="loginPassword">Password:</label>
                    </div>
                    <div class="col-span-1 w-auto">
                        <input class="border-2 border-black " name="loginPassword" type="password"/>
                    </div>
                </div>
            </form>
            <button type="submit">Submit</button>
        </div>
    </div>
</template>

<script>
import "../../../css/app.css"
export default {

}
</script>
