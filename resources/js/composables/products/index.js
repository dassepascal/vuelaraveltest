

export default function useProduct() {


    const add = async (productId) => {
        let response = await axios.post('/api/products', {
            productId: productId
        });

    // methode

    }
    return { add }
}
